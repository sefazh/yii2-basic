<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/1/25
 * @Time: 10:53
 */

namespace app\controllers;


use Yii;
use yii\filters\VerbFilter;
use yii\web\Response;

class AjaxCalendarController extends AjaxController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionEvents()
    {

        $json = [
            ['title' => 'All Day Event', 'start' => '2017-01-01 00:00:00'],
            [
                'title' => 'Long Event',
                'start' => '2017-01-20 00:00:00',
                'end' => '2017-01-23 00:00:00',
            ],
        ];

        return $json;
    }


    /**
     * 查询出事件数据
     *
        id	            可选      事件唯一标识，重复的事件具有相同的id
        title	       *必须*     事件在日历上显示的title
        allDay	        可选      true or false，是否是全天事件。
        start	       *必须*     事件的开始时间。
        end	            可选      结束时间。
        url	            可选      当指定后，事件被点击将打开对应url。
     *
        className	    可选      指定事件的样式。
        editable	    可选      事件是否可编辑，可编辑是指可以移动, 改变大小等。
        source	        可选      指向次event的eventsource对象。
        color	        可选      背景和边框颜色。
        backgroundColor	可选      背景颜色。
        borderColor	    可选      边框颜色。
        textColor	    可选      文本颜色。
     *
     *
     */
    protected function getEventData()
    {

    }

}