<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\students */
/* @var $form ActiveForm */
?>
<div class="Registration">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'grade') ?>
        <?= $form->field($model, 'class_id') ?>
        <?= $form->field($model, 'student_name') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'phone_home') ?>
        <?= $form->field($model, 'phone_cell') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'contact_name1') ?>
        <?= $form->field($model, 'contact_phone1') ?>
        <?= $form->field($model, 'contact_relation1') ?>
        <?= $form->field($model, 'contact_name2') ?>
        <?= $form->field($model, 'contact_phone2') ?>
        <?= $form->field($model, 'contact_relation2') ?>
        <?= $form->field($model, 'new_student') ?>
        <?= $form->field($model, 'date_of_birth') ?>
        <?= $form->field($model, 'gender') ?>
        <?= $form->field($model, 'date_of_baptism') ?>
        <?= $form->field($model, 'parish_where_baptized') ?>
        <?= $form->field($model, 'name_of_previous_school') ?>
        <?= $form->field($model, 'father_family_name') ?>
        <?= $form->field($model, 'father_name') ?>
        <?= $form->field($model, 'father_religion_rite') ?>
        <?= $form->field($model, 'father_place_of_birth') ?>
        <?= $form->field($model, 'father_parish_diocess') ?>
        <?= $form->field($model, 'mother_family_name') ?>
        <?= $form->field($model, 'mother_name') ?>
        <?= $form->field($model, 'mother_religion_rite') ?>
        <?= $form->field($model, 'mother_place_of_birth') ?>
        <?= $form->field($model, 'mother_parish_diocess') ?>
        <?= $form->field($model, 'date') ?>
        <?= $form->field($model, 'sign') ?>
        <?= $form->field($model, 'message_info') ?>
        <?= $form->field($model, 'baptism_doc_location') ?>
        <?= $form->field($model, 'other_data') ?>
        <?= $form->field($model, 'person_who_is_added') ?>
        <?= $form->field($model, 'sign_name') ?>
        <?= $form->field($model, 'safe_enviroment_authorization') ?>
        <?= $form->field($model, 'baptism_previously_uploaded') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- Registration -->
