<script type="text/javascript">

function send_k() {	
  $.post( "/basic/web/vineyard/view2", function( data ) {
	  $( "#list-of-post" ).html( data );
	});
}
 
</script>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Standard;

/* @var $this yii\web\View */
/* @var $model app\models\Vineyard */

$this->title = 'Create Vineyard';
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Vineyards',
		'url' => [ 
				'index' 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="vineyard-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="container">
		<div class="row">
			<div class="col-sm-4">
      <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VineyardName')->textInput(['maxlength' => true])?>

   
	<?= $form->field($model, 'FarmerID')->dropDownList($model->getWorkerName())?>

    <?= $form->field($model, 'GrapeID')->dropDownList($model->getGrapeName())?>

    <?= $form->field($model, 'ComeFrom')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'HarvestedAmount')->textInput()?>

    <?= $form->field($model, 'RipenessPercent')->textInput()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
    <div onclick="send_k();">====</div>
	<div id="list-of-post">

	</div>
	</div>
	</div>




</div>
