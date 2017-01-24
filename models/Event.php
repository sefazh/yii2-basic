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
class Event extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['code', 'name'], 'required'],
            [['population'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'time' => '时间',
            'type' => '类型',
            'content' => '内容',
        ];
    }
}
