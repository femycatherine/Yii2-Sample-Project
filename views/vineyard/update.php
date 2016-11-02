<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vineyard */

$this->title = 'Update Vineyard: ' . $model->VineyardID;
$this->params['breadcrumbs'][] = ['label' => 'Vineyards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->VineyardID, 'url' => ['view', 'id' => $model->VineyardID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vineyard-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
