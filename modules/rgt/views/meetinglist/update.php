<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingList */

$this->title = 'Update Meeting List: ' . $model->meeting_list_id;
$this->params['breadcrumbs'][] = ['label' => 'Meeting Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meeting_list_id, 'url' => ['view', 'id' => $model->meeting_list_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meeting-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
