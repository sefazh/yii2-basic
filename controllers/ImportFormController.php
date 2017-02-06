<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/2/6
 * @Time: 16:57
 */

namespace app\controllers;


use yii\filters\VerbFilter;

class ImportFormController extends AjaxController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    public function actionImport()
    {


        return ['aa' => 'bb'];
    }
}