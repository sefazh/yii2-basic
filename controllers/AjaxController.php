<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/1/25
 * @Time: 14:23
 */

namespace app\controllers;


use Yii;
use yii\base\Controller;
use yii\web\Response;

class AjaxController extends Controller
{
    public function init()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
    }
}