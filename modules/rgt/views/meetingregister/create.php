<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingRegister */

$this->title = 'เพิ่มรายการผู้เข้าประชุม';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้เข้าประชุม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meeting-register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
