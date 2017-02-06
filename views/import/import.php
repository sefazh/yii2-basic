<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UploadFile;
/* @var $this yii\web\View */

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
    </p>

    <?php ActiveForm::end() ?>

    <!--<form action="/import/import" method="post" enctype="multipart/form-data">
        <p>
            <?/*= Html::fileInput('file', '', ['class' => 'btn btn-default']) */?>
        </p>
        <p>
            <?/*= Html::submitButton('Submit', ['class' => 'btn btn-success']) */?>
        </p>
    </form>-->

</div>
