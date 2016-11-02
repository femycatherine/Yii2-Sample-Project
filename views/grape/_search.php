<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GrapeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grape-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'GrapeID') ?>

    <?= $form->field($model, 'GrapeType') ?>

    <?= $form->field($model, 'JuiceConversionRatio') ?>

    <?= $form->field($model, 'StorageContainer') ?>

    <?= $form->field($model, 'AgingRequirement') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
