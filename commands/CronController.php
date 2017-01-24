<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\EventSearch;
use Yii;
use yii\console\Controller;

/**
 * 定时检查日历数据库，查找已到期的事件进行处理
 */
class CronController extends Controller
{

    public function actionIndex()
    {


        $this->checkEvents();
    }


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


}
