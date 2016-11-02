<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grape */

$this->title = 'Update Grape: ' . $model->GrapeID;
$this->params['breadcrumbs'][] = ['label' => 'Grapes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->GrapeID, 'url' => ['view', 'id' => $model->GrapeID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grape-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
