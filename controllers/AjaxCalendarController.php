<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/1/25
 * @Time: 10:53
 */

namespace app\controllers;


use app\models\Calendar;
use yii;
use yii\db\Query;
use yii\filters\VerbFilter;

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
        $get = Yii::$app->request->get();

        $data = $this->getEventData($get);

        foreach ($data as $key => $value) {
            $data[$key]['allDay'] = (bool)$value['allday'];
//            $data[$key]['start'] = self::yearlyDateFormat($value['starttime']);
//            $data[$key]['end'] = self::yearlyDateFormat($value['endtime']);
            $data[$key]['start'] = $value['starttime'];
            $data[$key]['end'] = $value['endtime'];

            $data[$key]['className'] = isset($value['style']) ? 'fc-event-type-'.$value['style'] : '';

            unset($data[$key]['allday']);
            unset($data[$key]['starttime']);
            unset($data[$key]['endtime']);
        }

        $json = [
            ['id' => 999, 'title' => 'All Day Event', 'start' => '2017-02-01 00:00:00'],
            ['id' => 999, 'title' => 'All Day Event', 'start' => '2017-01-01 00:00:00'],
        ];

        $data = array_merge($data, $json);

        return $data;
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
     * @param $get array
     * @return array
     */
    protected function getEventData($get)
    {
        $query = new Query();

        $start = $get['start'];
        $end = $get['end'];

        $rows = $query
            ->from('calendar')
            ->where(['or', ['and', "starttime >= {$start}", "starttime <= {$end}"], ['and', "endtime is not null", "endtime >= {$start}"]])
            ->andWhere(['status'=>1])
            ->all();

        //重复事件

//        $repeat = $this->getRepeatData($start, $end);
//
//        $data = array_merge($rows, $repeat);

        $data = $rows;
        return $data;
    }



    protected function getRepeatData($start, $end)
    {
        $start = date('m-d', $start);
        $end = date('m-d', $end);

        $data = (new Query())
            ->from('yearly')
            ->where(['or', ['and', "starttime >= '{$start}'", "starttime <= '{$end}'"], ['and', "endtime is not null", "endtime >= '{$start}'"]])
            ->andWhere(['status' => 1])
            ->all();

        return $data;
    }


    protected static function yearlyDateFormat($date)
    {
        if (is_numeric($date)) {
            return date('Y-m-d H:i:s', $date);
        } else {
            $y = date('Y-');
            return $y.$date;
        }

    }


    /**
     * 添加日历事件
     *
     * @return int|string
     */
    public function actionCreateEvent()
    {
        $fields = [
            'action',
            'e_hour',
            'e_minute',
            'enddate',
            'event',
            'isallday',
            'isend',
            's_hour',
            's_minute',
            'startdate',
            'style',
        ];


        $isallday = isset($_POST['isallday']) ? $_POST['isallday'] : 0;//是否是全天事件
        $isend = isset($_POST['isend']) ? $_POST['isend'] : 0;//是否有结束时间

        $startdate = trim($_POST['startdate']);//开始日期
        $enddate = trim($_POST['enddate']);//结束日期

        $s_time = $_POST['s_hour'].':'.$_POST['s_minute'].':00';//开始时间
        $e_time = $_POST['e_hour'].':'.$_POST['e_minute'].':00';//结束时间

        if($isallday==1 && $isend==1){
            $starttime = strtotime($startdate);
            $endtime = strtotime($enddate);
        }elseif($isallday==1 && $isend==""){
            $starttime = strtotime($startdate);
            $endtime = null;
        }elseif($isallday=="" && $isend==1){
            $starttime = strtotime($startdate.' '.$s_time);
            $endtime = strtotime($enddate.' '.$e_time);
        }else{
            $starttime = strtotime($startdate.' '.$s_time);
            $endtime = null;
        }

        $style = isset($_POST['style']) ? $_POST['style'] : '';


        $data = [
            'title' => $_POST['event'],
            'allday' => $isallday,
            'starttime' => $starttime,
            'endtime' => $endtime,
            'url' => '',
            'style' => $style,
            'status' => 1
        ];


        $model = new Calendar();

        if ($model->load($data, '') && $model->save()) {
            return 1;
        } else {
            return 'fail';
        }
    }
}