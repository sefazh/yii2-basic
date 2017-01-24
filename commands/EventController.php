<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/1/24
 * @Time: 17:57
 */

namespace app\commands;

use app\common\Mail;
use yii\base\Controller;
use yii\helpers\ArrayHelper;

class EventController extends Controller
{

    public static function handle($event)
    {
        if (empty($event)) {
            return false;
        }

        switch ($event['type']) {
            case 'mail':
                self::dealMail($event);
                break;
            default:

        }

        return true;
    }


    /**
     * 处理邮件类事务
     *
     * @param $event
     * @return bool
     */
    protected static function dealMail($event)
    {
        $to = 'celinehe0708@163.com';
        $title = '【邮件提醒】'.$event['date'].$event['hour'].$event['minute'];
        $body = ArrayHelper::getValue($event, 'content');

        $result = Mail::send($to, $title, $body);

        return $result;
    }
}