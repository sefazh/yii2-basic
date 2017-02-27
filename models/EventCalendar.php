<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/2/27
 * @Time: 18:05
 */

namespace app\models;


use yii\db\ActiveRecord;

class EventCalendar extends ActiveRecord
{
    public static function tableName()
    {
        return 'event_calendar';
    }
}