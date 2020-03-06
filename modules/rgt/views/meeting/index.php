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
            'attribute' => 'meeting_list_name',
        ],
        [
            'label' => 'รายละเอียด',
            'attribute' => 'meeting_list_detail',
        ],
        [
            'label' => 'ลงทะเบียน',
            'attribute' => 'meeting_list_name',
            'format' => 'raw',
            'value' => function($data) {
                $cc = \app\modules\rgt\models\MeetingRegis::find(['id' => $data['meeting_list_id']])->count();
                if ($cc < $data['meeting_list_limit']) {
                    return Html::a('ลงทะเบียน', ['regis', 'id' => $data['meeting_list_id']]);
                } else {
                    return Html::a('ผู้เข้าร่วมเต็มจำนวน', '', ['class' => 'text-danger']);
                }
            },
        ],
        [
            'label' => 'ตรวจสอบรายชื่อ',
            'format' => 'raw',
            'attribute' => 'meeting_list_name',
            'value' => function($data) {
                return Html::a('ตรวจสอบรายชื่อ', ['regislist', 'id' => $data['meeting_list_id']]);
            },
        ],
    ],
]);
