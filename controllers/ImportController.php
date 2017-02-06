<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/2/6
 * @Time: 16:54
 */

namespace app\controllers;


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
        $phpexcel=new \PHPExcel();

//        if ($format == "xls") {
//            $excelReader = \PHPExcel_IOFactory::createReader('Excel5');
//        } else {
//            $excelReader = \PHPExcel_IOFactory::createReader('Excel2007');
//        }

        $excelReader = \PHPExcel_IOFactory::createReader('Excel2007');

        $phpexcel    = $excelReader->load($excelFile)->getSheet(0);//载入文件并获取第一个sheet
        $total_line  = $phpexcel->getHighestRow();//总行数
        $total_column= $phpexcel->getHighestColumn();//总列数

        $result = array();
        if($total_line > 1){
            for($row = 1; $row <= $total_line; $row++){
                $rowData = array();
                for($column = 'A'; $column <= $total_column; $column++){
                    $rowData[] = trim($phpexcel->getCell($column.$row)->getValue());
                }

                $result[] = $rowData;
            }
        }

        echo "<pre>";
        var_dump($result);
        die;
//        if ($ok == 1){
//            $this->redirect(array('index']);
//        } else{
//            echo "<script>alert('操作失败');window.history.back();</script>";
//        }
    }
}