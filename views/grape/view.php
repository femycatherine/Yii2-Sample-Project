<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grape */

$this->title = $model->GrapeID;
$this->params['breadcrumbs'][] = ['label' => 'Grapes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grape-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->GrapeID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->GrapeID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'GrapeID',
            'GrapeType',
            'JuiceConversionRatio',
            'StorageContainer',
            'AgingRequirement',
        ],
    ]) ?>

</div>
