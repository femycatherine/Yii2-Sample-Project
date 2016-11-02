<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vineyard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vineyard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VineyardName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FarmerID')->textInput() ?>

    <?= $form->field($model, 'GrapeID')->textInput() ?>

    <?= $form->field($model, 'ComeFrom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HarvestedAmount')->textInput() ?>

    <?= $form->field($model, 'RipenessPercent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
