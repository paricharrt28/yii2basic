<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingRegister */

$this->title = 'แก้ไข : ' . $model->meeting_register_id;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้เข้าประชุม', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meeting_register_id, 'url' => ['view', 'id' => $model->meeting_register_id]];
$this->params['breadcrumbs'][] = 'แก้ไขข้อมูลผู้เข้าประชุม';
?>
<div class="meeting-register-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
