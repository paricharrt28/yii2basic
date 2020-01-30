<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'meeting_list_id') ?>

    <?= $form->field($model, 'meeting_list_name') ?>

    <?= $form->field($model, 'meeting_list_detail') ?>

    <?= $form->field($model, 'meeting_list_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
