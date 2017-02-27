<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/2/27
 * @Time: 18:01
 */

namespace app\models;


use yii\db\ActiveRecord;

class EventContent extends ActiveRecord
{
    public static function tableName()
    {
        return 'event_content';
    }


}