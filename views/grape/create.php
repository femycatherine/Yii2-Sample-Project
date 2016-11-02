<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Grape */

$this->title = 'Create Grape';
$this->params['breadcrumbs'][] = ['label' => 'Grapes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grape-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
