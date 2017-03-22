<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\BirthdaySearch;
use app\models\EventSearch;
use yii\console\Controller;

/**
 * 定时检查日历数据库，查找已到期的事件进行处理
 *
 * 定时任务命令：
 *  yii cron/index
 */
class CronController extends Controller
{

    public function actionIndex()
    {
        $this->checkBirthday();
    }


    /**
     * 检查 full calendar 事件列表
     * @return bool
     */
    protected function checkEvents()
    {
        $now = time();
        $data = (new EventSearch())->getAll($now);

        print_r($data);

        if (empty($data)) {
            return false;
        }

        foreach ($data as $value) {
            print_r(EventController::handle($value));
        }
    }


    /**
     * 检查上传的生日事件列表并对当天的事件发送邮件通知
     * 记录发送日志
     */
    protected function checkBirthday()
    {
        $date = date('m-d', $_SERVER['REQUEST_TIME']);
        $list = (new BirthdaySearch())->getByDate($date);

        if (empty($list)) exit;

        foreach ($list as $value) {
            EventController::mail($value['date'], $value['event'], $value['detail']);
        }

    }


}
