<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Grape */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grape-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'GrapeID')->textInput() ?>

    <?= $form->field($model, 'GrapeType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JuiceConversionRatio')->textInput() ?>

    <?= $form->field($model, 'StorageContainer')->dropDownList([ 'Stainless Steel Tank' => 'Stainless Steel Tank', 'Oak Barrel' => 'Oak Barrel', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'AgingRequirement')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
