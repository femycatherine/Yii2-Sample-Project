<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persons */

$this->title = 'Update Persons: ' . $model->P_Id;
$this->params['breadcrumbs'][] = ['label' => 'Persons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->P_Id, 'url' => ['view', 'id' => $model->P_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="persons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
