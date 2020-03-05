<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingRegisterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-register-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'meeting_register_id') ?>

    <?= $form->field($model, 'meeting_register_name') ?>

    <?= $form->field($model, 'meeting_register_cid') ?>

    <?= $form->field($model, 'meeting_register_date') ?>

    <?= $form->field($model, 'meeting_register_active') ?>

    <?php // echo $form->field($model, 'meeting_register_hospcode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
