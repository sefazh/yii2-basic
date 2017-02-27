<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/2/6
 * @Time: 16:54
 */

namespace app\controllers;


use app\common\PhpExcel;
use app\models\EventCalendar;
use app\models\EventContent;
use app\models\UploadFile;
use Yii;
use yii\base\Controller;
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
     * 导入 选择文件上传页面
     *
     * @return string
     */
    public function actionImport()
    {
        $model = new UploadFile();


        if (Yii::$app->request->isPost) {

            $model->file = UploadedFile::getInstance($model, 'file');

            if ($result = $model->upload()) {
                // 文件上传成功
//                return;
            }

            var_dump($result);
            die;
        }

        return $this->render('import');
    }


    public function actionExcel()
    {
        $excelFile = '../uploads/calendar.xlsx';

        $data = PhpExcel::read($excelFile);
        array_shift($data);


        foreach ($data as $value) {

            $contentModel = new EventContent();
            $contentModel->title = $value[2];
            
            if ($contentModel->save()) {

                $date = explode('-', str_replace(['/', '月'], '-', $value[1]));

                $calendarModel = new EventCalendar();
                $calendarModel->event_id = $contentModel->id;
                $calendarModel->month = $date[0];
                $calendarModel->day = $date[1];
                $calendarModel->during = 1;
                $calendarModel->type = 'year';

                $calendarModel->save();
            }

        }


        echo "<pre>";
        var_dump($data);

    }
}