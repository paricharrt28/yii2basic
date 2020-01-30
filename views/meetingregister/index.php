<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MeetingRegisterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meeting Registers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meeting-register-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Meeting Register', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'meeting_register_id',
            'meeting_register_name',
            'meeting_register_cid',
            'meeting_register_date',
            'meeting_register_active',
            //'meeting_register_hospcode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
