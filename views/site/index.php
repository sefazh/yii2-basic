<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$this->params['carousel'] = [
    [
        'image' => '/img/vector-ban2.jpg',
        'active' => true
    ],
    [
        'image' => '/img/vector-ban3.jpg',
        'active' => false
    ],
    [
        'image' => '/img/vector-ban4.jpg',
        'active' => false
    ],
    [
        'image' => '/img/vector-ban5.jpg',
        'active' => false
    ],
];
$this->params['columns'] = [
    [
        'image' => '/img/2-5.jpg',
    ],
    [
        'image' => '/img/3-1.jpg',
    ],
    [
        'image' => '/img/3-2.jpg',
    ],
];
$this->params['featurette'] = [
    [
        'image' => '/img/2-5.jpg',
    ],
    [
        'image' => '/img/3-1.jpg',
    ],
    [
        'image' => '/img/3-2.jpg',
    ],
];
?>
<div class="site-index">

    <!--<div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php foreach ($this->params['carousel'] as $key => $val) { ?>

            <li data-target="#myCarousel" data-slide-to="<?= $key ?>" <?php if ( !empty($val['active'])) echo 'class="active"' ?>></li>

            <?php } ?>
        </ol>

        <div class="carousel-inner" role="listbox">

        <?php foreach ($this->params['carousel'] as $key => $val) { ?>

            <div class="item <?php if ( !empty($val['active'])) echo 'active' ?> ">
                <img src="<?= $val['image'] ?>" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?= Yii::$app->basePath ?></h1>
<!--                        <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>-->
<!--                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>-->
                    </div>
                </div>
            </div>

        <?php } ?>

        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container marketing">

        <div class="row">
            <?php foreach($this->params['columns'] as $key => $val) { ?>
                <div class="col-lg-4">
                    <img class="img-circle" src="<?= $val['image'] ?>" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h2>Heading</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div>
            <?php } ?>

        </div>

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <?php foreach ($this->params['featurette'] as $key => $val) { ?>

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?= $val['image'] ?>" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

        <?php } ?>


        <div class="row featurette">
            <div class="col-md-5">
                <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div>
</div>
