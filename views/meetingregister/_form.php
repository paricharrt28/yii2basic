<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingRegister */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-register-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meeting_register_name')->textInput() ?>

    <?= $form->field($model, 'meeting_register_cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meeting_register_date')->textInput() ?>

    <?= $form->field($model, 'meeting_register_active')->textInput() ?>

    <?= $form->field($model, 'meeting_register_hospcode')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
