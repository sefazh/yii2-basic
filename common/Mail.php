<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/1/24
 * @Time: 18:01
 */

namespace app\common;


use Yii;

class Mail
{
    public static function send($to, $title, $body)
    {
        return Yii::$app->mailer->compose()
            ->setTo($to)
            ->setSubject($title)
            ->setHtmlBody($body)    //发布可以带html标签的文本
            ->send();
    }
}