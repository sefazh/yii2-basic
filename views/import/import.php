<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use app\models\UploadFile;

/* @var $this yii\web\View */
/* @var $list yii\data\ActiveDataProvider */

$this->title = '导入';
$this->params['breadcrumbs'][] = $this->title;
$model = new UploadFile();
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['method' => 'post','enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <p>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Get Template', ['template'], ['class' => 'btn btn-default', 'target' => '_blank']) ?>
    </p>

    <?php ActiveForm::end() ?>

    <?php

        if (!empty($list)) :

            echo '<table class="table table-bordered">';

            foreach ($list as $key => $val) {

                echo '<tr>';

                foreach ($val as $k => $v) {

                    echo '<td>', $v, '</td>';

                }

                echo '</tr>';

            }

            echo '</table>';

        endif;
    ?>

</div>
