<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingRegister */

$this->title = 'Update Meeting Register: ' . $model->meeting_register_id;
$this->params['breadcrumbs'][] = ['label' => 'Meeting Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meeting_register_id, 'url' => ['view', 'id' => $model->meeting_register_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meeting-register-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
