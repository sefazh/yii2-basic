<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/2/27
 * @Time: 18:01
 *
 *
 * CREATE TABLE `birthday` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK',
        `event` varchar(255) NOT NULL DEFAULT '' COMMENT '事件内容',
        `detail` varchar(511) NOT NULL DEFAULT '' COMMENT '事件详细说明',
        `date` varchar(20) NOT NULL COMMENT '日期',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
 */

namespace app\models;


use yii\db\ActiveRecord;

class Birthday extends ActiveRecord
{
    public static function tableName()
    {
        return 'birthday';
    }

}