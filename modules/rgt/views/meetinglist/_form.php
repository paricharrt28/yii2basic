<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meeting_list_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meeting_list_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meeting_list_limit')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
