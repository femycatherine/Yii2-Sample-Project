<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VineyardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vineyard-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'VineyardID') ?>

    <?= $form->field($model, 'VineyardName') ?>

    <?= $form->field($model, 'FarmerID') ?>

    <?= $form->field($model, 'GrapeID') ?>

    <?= $form->field($model, 'ComeFrom') ?>

    <?php  echo $form->field($model, 'HarvestedAmount') ?>

    <?php  echo $form->field($model, 'RipenessPercent') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
