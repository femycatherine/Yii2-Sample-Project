<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VineyardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vineyards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vineyard-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vineyard', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 <div class="container">
 
 <div class="row" >
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'VineyardID',
            'vineyardName',
            'WorkerName',
            'GrapeType',
            'HarvestedAmount',
            'RipenessPercent',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
   </div>
</div>
