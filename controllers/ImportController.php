<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/2/6
 * @Time: 16:54
 */

namespace app\controllers;


use app\common\PhpExcel;
use app\models\Birthday;
use app\models\BirthdaySearch;
use app\models\EventCalendar;
use app\models\EventContent;
use app\models\UploadFile;
use Yii;
use yii\base\Controller;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class ImportController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['full-calendar'],
                'rules' => [
                    [
                        'actions' => ['import'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    /**
     * 已导入事件列表页面
     */
    public function actionList()
    {

        $searchModel = new BirthdaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * 导入 选择文件上传页面
     *
     * @return string
     */
    public function actionImport()
    {
        $model = new UploadFile();

        $data = [];

        if (Yii::$app->request->isPost) {

            $model->file = UploadedFile::getInstance($model, 'file');

            if ($va = $model->validate()) {

                $saveName = $model->file->baseName . '_' . date('Ymd') . time();
                $fileName = $saveName . $model->file->extension;
                $filePath = '../uploads/' . $fileName;
                $res = $model->file->saveAs($filePath);

                if ($res) {
                    // 文件上传成功
                    $data = PhpExcel::read($filePath);

                    $list = $data;
                    array_shift($list);

                    $data = $this->saveEvent($list);
                }
            }
        }

        return $this->render('import', ['list' => $data]);
    }


    /**
     * xlsx模板文件下载
     */
    public function actionTemplate()
    {
        $file = Yii::$app->basePath.'/uploads/calendar.xlsx';
        Yii::$app->response->sendFile($file);
    }


    /**
     * 保存上传的事件
     * @param $list
     * @return array
     * @throws Exception
     */
    private function saveEvent($list)
    {

        $preg = '/^[0-1][0-9]-[0-3][0-9]$/';
        foreach ($list as $key => $value) {

            if (empty($value[0]) || empty($value[1])) {
                unset($list[$key]);
                continue;
            }

            if (!preg_match($preg, $value[1])) {
                throw new Exception('日期格式不正确');
            }

            $birthdayModel = new Birthday();

            $birthdayModel->date = $value[1];
            $birthdayModel->event = $value[2];
            $birthdayModel->detail = $value[2];

            if (!$birthdayModel->save()) {
                throw new Exception('保存失败');
            }
        }

        return $list;
    }
}