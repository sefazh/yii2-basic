<?php

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Create Country';
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="/js/fullcalendar/bootstrap-fullcalendar.css">
<link href="/css/style.css" rel="stylesheet">
<link href="/css/style-responsive.css" rel="stylesheet">
<div class="wrapper">

    <!-- page start-->
    <div class="row">

        <aside class="col-md-12">
            <section class="panel">
                <div id="calendar" class="has-toolbar"></div>
            </section>
        </aside>

    </div>
    <!-- page end-->

</div>
<!--body wrapper end-->
<script src="/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="/js/fullcalendar/fullcalendar.min.js"></script>
<script src="/js/external-dragging-calendar.js"></script>
