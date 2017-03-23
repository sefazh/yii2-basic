<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/1/24
 * @Time: 17:57
 */

namespace app\commands;

use app\common\Log;
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
        $to = 'chongsh@163.com';
        $title = '【邮件提醒】'.$event['date'].$event['hour'].$event['minute'];
        $body = ArrayHelper::getValue($event, 'content');

        $result = Mail::send($to, $title, $body);

        return $result;
    }




    /****************************************************************************/


    /**
     * 发送邮件
     *
     * @param $date
     * @param $title
     * @param $content
     * @return bool
     */
    public static function mail($date, $title, $content)
    {
        $logfile = 'commands/cron.log';
        Log::log('准备发送邮件通知邮件', [$date, $title, $content], $logfile);

        $to = 'chongsh@163.com';
        $title = '【邮件提醒】'.$date .' '. $title;
        $body = $content;

        $result = Mail::send($to, $title, $body);

        Log::log(
            $result ? '邮件发送成功' : '邮件发送失败',
            $result ? [] : [$date, $title, $content],
            $logfile);

        return $result;
    }
}