<?php
namespace yii\widgets;

use Yii;
use yii\base\Widget;
use yii\bootstrap\Html;

class Carousel extends Widget
{

    public $carouselId = 'myCarousel';

    public $items = [];

    /**
     * Renders the widget.
     */
    public function run()
    {
        if (empty($this->items)) {
            return;
        }

        echo $this->renderOne();
    }


    /**
     * 渲染Dom
     *
     * @return string
     */
    protected function renderOne()
    {
        $indicators = $carousels = [];
        foreach ($this->items as $key => $item) {
            $indicators[] = $this->renderIndicatorInner($item, $key);
            $carousels[] = $this->renderCarouselInner($item);
        }

        $indicator = Html::tag('ol', implode('', $indicators), ['class' => 'carousel-indicators']);
        $carousel = Html::tag('div', implode('', $carousels), ['class' => 'carousel-inner', 'role' => 'listbox']);
        $context = $this->renderContext();

        $options = ['id' => $this->carouselId, 'class' => ['carousel', 'slide'], 'data-ride' => 'carousel'];
        return Html::tag('div', $indicator.$carousel.$context, $options);
    }


    /**
     * 单个导航器的DOM
     * <li data-target="#myCarousel" data-slide-to="<?= $key ?>" class="active"></li>
     *
     * @param $item array
     * @param $key integer
     * @return string
     */
    protected function renderIndicatorInner($item, $key)
    {
        $options = ['data-target' => '#'.$this->carouselId, 'data-slide-to' => $key];
        if (! empty($item['active'])) {
            Html::addCssClass($options, ['active']);
        }

        return Html::tag('li', '', $options);
    }


    /**
     *  <div class="item active">
            <img src="<?= $val['image'] ?>" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?= Yii::$app->basePath ?></h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
     *
     * @param $item array
     * @return string
     */
    protected function renderCarouselInner($item)
    {
        $img =  Html::img($item['image']['src'], ['alt' => $item['image']['alt']]);
        $options = ['class' => 'item'];
        if (! empty($item['active'])) {
            Html::addCssClass($options, ['active']);
        }
        $caption = Html::tag('div', '', ['class' => 'carousel-caption']);
        $container = Html::tag('div', $caption, ['class' => 'container']);

        return Html::tag('div', $img . $container, $options);

    }


    /**
     * prev & next
     *
     * @return string
     */
    protected function renderContext()
    {
        $html = <<<context
<a class="left carousel-control" href="#{$this->carouselId}" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#{$this->carouselId}" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
</a>
context;

        return $html;
    }

}
