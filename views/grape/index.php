<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GrapeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grapes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grape-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Grape', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'GrapeID',
            'GrapeType',
            'JuiceConversionRatio',
            'StorageContainer',
            'AgingRequirement',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
