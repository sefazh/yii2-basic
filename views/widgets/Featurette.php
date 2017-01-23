<?php
namespace yii\widgets;

use Yii;
use yii\base\Widget;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/**
 * Class Featurette
 * @package yii\widgets
 *
 *  <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
    </div>
 *
 *
 *  $feature = [
 *      'layout' => ['word', 'image'],
 *      'word'  => ['heading' => '', 'muted' => '', 'lead' => ''],
 *      'image' => ['src' => '', 'alt' => ''],
 *  ];
 *
 */
class Featurette extends Widget
{

    public $features = [];

    /**
     * Renders the widget.
     */
    public function run()
    {
        if (empty($this->features)) {
            return;
        }

        echo $this->renderItem();
    }


    /**
     * 渲染Dom
     *
     * @return string
     */
    protected function renderItem()
    {
        $features = [];
        foreach ($this->features as $key => $feature) {
            $word = Html::tag('div',
                $this->renderWords(ArrayHelper::getValue($feature, 'word', [])),
                ['class' => 'col-md-7']
            );
            $image = Html::tag('div',
                $this->renderImage(ArrayHelper::getValue($feature, 'image', [])),
                ['class' => 'col-md-5']
            );

            $temp = '';
            foreach ($feature['layout'] as $v) {
                if (!empty($$v)) $temp .= $$v;
            }

            $features[] = Html::tag('div', $temp, ['class' => ['row', 'featurette']]);
        }

        $divider = $this->renderDivider();

        return $divider . Html::tag('div', implode($divider, $features), ['class' => ['row', 'featurette']]) . $divider;
    }


    /**
     *
        <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
     *
     *
     * @param $word
     * @return string
     */
    protected function renderWords($word)
    {
        $muted = Html::tag('span', ArrayHelper::getValue($word, 'muted'), ['class' => 'text-muted']);
        $heading = Html::tag('h2', ArrayHelper::getValue($word, 'heading') . $muted, ['class' => 'featurette-heading']);
        $lead = Html::tag('p', ArrayHelper::getValue($word, 'lead'), ['class' => 'lead']);

        return $heading . $lead;
    }


    /**
     *
     *
        <div class="col-md-5">
            <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
     *
     *
     * @param $image
     * @return string
     */
    protected function renderImage($image)
    {
        return Html::img(
            ArrayHelper::getValue($image, 'src'),
            [
                'alt' => ArrayHelper::getValue($image, 'alt'),
                'class' => ['featurette-image', 'img-responsive'],
                'style' => 'width: 100%;'
            ]);
    }


    /**
     * featurette-divider
     *
     * @return string
     */
    protected function renderDivider()
    {
        return '<hr class="featurette-divider">';
    }

}
