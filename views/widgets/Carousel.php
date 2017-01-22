<?php
namespace yii\widgets;

use Yii;
use yii\base\Widget;

class Carousel extends Widget
{

    public $tag = 'ul';

    public $options = ['class' => 'breadcrumb'];

    public $encodeLabels = true;

    public $homeLink;

    public $links = [];

    public $itemTemplate = "<li>{link}</li>\n";

    public $activeItemTemplate = "<li class=\"active\">{link}</li>\n";


    /**
     *
     * $carousel = [
     *
     *      [
     *          'image' => '',
     *          'caption' => [
     *              ['tag' => 'h1', 'inner' => ''],
     *              ['tag' => 'p', 'inner' => [
     *                      '',
     *                      ['tag' => '', 'inner'],
     *                      ['tag' => '', 'inner'],
     *                  ]
     *              ],
     *          ],
     *      ],
     *
     * ];
     *
     *
     */


    /**
     * Renders the widget.
     */
    public function run()
    {

    }



    /**
     *
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
                        <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
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


     *
     */
}
