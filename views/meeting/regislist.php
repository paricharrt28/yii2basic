<?php

use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'list.meeting_list_name',
        'meeting_regis_date',
        'register.meeting_register_cid',
        'register.meeting_register_name',
        'register.meeting_register_hospcode',
    ]
]);


