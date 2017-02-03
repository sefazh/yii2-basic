<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property integer $time
 * @property integer $type
 * @property string $content
 */
class Calendar extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
//        'title' => $title,
//        'allday' => $allday,
//        'starttime' => $starttime,
//        'endtime' => $endtime,
//        'url' => '',
//        'style' => '',
//        'status' => 1
        return [
            [['title', 'allday', 'starttime'], 'required'],
            [['allday', 'status'], 'integer'],
            [['endtime', 'url', 'style'], 'default', 'value'=>null],
        ];
    }

    /**
     * @inheritdoc
     */
    /*public function attributeLabels()
    {
        return [
            'time' => '时间',
            'type' => '类型',
            'content' => '内容',
        ];
    }*/
}
