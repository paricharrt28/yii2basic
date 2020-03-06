<?php

use yii\bootstrap4\Html;
use kartik\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '5%'
        ],
        [
            'label' => 'หัวข้อการประชุม',
            'attribute' => 'listname',
        ],
        [
            'label' => 'จำนวนผู้เข้าร่วม',
            'attribute' => 'cc',
        ],
    ],
]);
