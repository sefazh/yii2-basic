<?php
use \yii\helpers\ArrayHelper;

include_once Yii::$app->viewPath . DIRECTORY_SEPARATOR . 'widgets' . DIRECTORY_SEPARATOR . 'Carousel.php';
include_once Yii::$app->viewPath . DIRECTORY_SEPARATOR . 'widgets' . DIRECTORY_SEPARATOR . 'Featurette.php';

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$this->params['columns'] = [
    [
        'image' => '/img/2-5.jpg',
        'heading' => 'Heading',
        'desc' => 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.',
        'button' => [
            'info' => 'View details &raquo;',
            'url'  => '#'
        ],
    ],
    [
        'image' => '/img/3-1.jpg',
        'heading' => 'Heading',
        'desc' => 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.',
        'button' => [
            'info' => 'View details &raquo;',
            'url'  => '#'
        ],
    ],
    [
        'image' => '/img/3-2.jpg',
        'heading' => 'Heading',
        'desc' => 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.',
        'button' => [
            'info' => 'View details &raquo;',
            'url'  => '#'
        ],
    ],
];
?>
<div class="site-index">

    <?php

        echo \yii\widgets\Carousel::widget([
            'carouselId' => 'myCarousel',
            'items' => [
                [
                    'image' => ['src' => '/img/vector-ban2.jpg', 'alt' => ''],
                    'headline' => [
                        ['h1' => 'headline1'],
                        ['p' => 'Note: If you\'re viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.'],
                        ['p' => '<a class="btn btn-lg btn-info" href="#" role="button">Sign up today</a>']
                    ],
                    'active' => true]
                ,
                [
                    'image' => ['src' => '/img/vector-ban3.jpg', 'alt' => ''],
                    'headline' => [
                        ['h1' => 'headline2'],
                        ['p' => 'Note: If you\'re viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.'],
                        ['p' => '<a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>']
                    ],
                    'active' => false
                ],
                [
                    'image' => ['src' => '/img/vector-ban4.jpg', 'alt' => ''],
                    'headline' => [
                        ['h1' => 'headline3'],
                        ['p' => 'Note: If you\'re viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.'],
                        ['p' => '<a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>']
                    ],
                    'active' => false
                ],
                [
                    'image' => ['src' => '/img/vector-ban5.jpg', 'alt' => ''],
                    'headline' => [
                        ['h1' => 'headline4'],
                        ['p' => 'Note: If you\'re viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.'],
                        ['p' => '<a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>']
                    ],
                    'active' => false
                ],
            ]
        ]);

    ?>

    <div class="container marketing">

        <div class="row">
            <?php foreach($this->params['columns'] as $key => $val) { ?>
                <div class="col-lg-4">
                    <img class="img-circle" src="<?= ArrayHelper::getValue($val, 'image') ?>" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h2><?= ArrayHelper::getValue($val, 'heading') ?></h2>
                    <p><?= ArrayHelper::getValue($val, 'desc') ?></p>
                    <p><a class="btn btn-default" href="<?= ArrayHelper::getValue($val, 'button.url') ?>" role="button"><?= ArrayHelper::getValue($val, 'button.info') ?></a></p>
                </div>
            <?php } ?>

        </div>

        <!-- START THE FEATURETTES -->

        <?php
            echo \yii\widgets\Featurette::widget(['features' => [
                [
                    'layout' => ['word', 'image'],
                    'word'  => [
                        'heading' => "First featurette heading. ",
                        'muted' => "It'll blow your mind.",
                        'lead' => 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'
                    ],
                    'image' => ['src' => '/img/3-3.jpg', 'alt' => ''],
                ],
                [
                    'layout' => ['image', 'word'],
                    'word'  => [
                        'heading' => "Oh yeah, it's that good. ",
                        'muted' => "See for yourself.",
                        'lead' => 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'
                    ],
                    'image' => ['src' => '/img/3-4.jpg', 'alt' => ''],
                ],
                [
                    'layout' => ['word', 'image'],
                    'word'  => [
                        'heading' => "And lastly, this one. ",
                        'muted' => "Checkmate.",
                        'lead' => 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'
                    ],
                    'image' => ['src' => '/img/3-5.jpg', 'alt' => ''],
                ],
            ]]);
        ?>

        <!-- /END THE FEATURETTES -->

    </div>
</div>
