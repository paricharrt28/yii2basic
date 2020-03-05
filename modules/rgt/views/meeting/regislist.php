<?php

#use yii\grid\GridView;

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\components\Ccomponent;

$js = <<<JS
    $("#bb").click(function() {
        $.pjax.reload({container: '#pjaxGridview01', async: false});
    });
    setInterval(function(){
         $.pjax.reload({container:"#pjaxGridview01"});
    }, 5000);

JS;
$this->registerJs($js, $this::POS_READY);

Pjax::begin(['id' => 'pjaxGridview01']);
//echo date('H:i:s');
echo GridView::widget([
    'bordered' => false,
    'striped' => true,
    'condensed' => true,
    'responsiveWrap' => false,
    /*
      'beforeHeader' => [
      [
      'columns' => [
      ['content' => '', 'options' => ['colspan' => 3, 'class' => 'text-center warning']],
      ['content' => 'ข้อมูลทั่วไป', 'options' => ['colspan' => 6, 'class' => 'text-center warning']],
      ],
      ]
      ],
     *
     */
    'showPageSummary' => true,
    'toolbar' => [
        '{export}',
        '{toggleData}'
    ],
    'panel' => [
        'type' => 'primary',
        'heading' => 'รายชื่อผู้เข้าอบรม',
    ],
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '5%'
        ],
        'list.meeting_list_name',
        [
            'attribute' => 'meeting_regis_date',
            'visible' => 1,
            'value' => function($data) {
                return Ccomponent::getThaiDate($data['meeting_regis_date'], 'S', true);
            },
        ],
        [
            'label' => 'เลขบัตร',
            'attribute' => 'register.meeting_register_cid',
            'visible' => 1,
            'value' => function($data) {
                return Ccomponent::FnIDX($data['register']['meeting_register_cid']);
            },
        ],
        'register.meeting_register_name',
        'register.meeting_register_hospcode',
        [
            'label' => '#',
            'format' => 'raw',
            'pageSummary' => 'รวม',
            'value' => function($data) {
                return Html::a('XX', ['s', 'id' => 1], ['class' => 'btn btn-primary']);
            },
        ],
        [
            'label' => 'ตัวเลข',
            'format' => 'raw',
            'pageSummary' => true,
            'value' => function($data) {
                return 1;
            },
        ],
        [
            'label' => 'รูปภาพ',
            'format' => 'raw',
            'hAlign' => 'center',
            //'vAlign' => '',
            //'pageSummary' => true,
            'value' => function($data) {
                return Html::img('http://nrefer.moph.go.th/images/moph.png', ['height' => 24]);
            },
        ]
    ]
]);
Pjax::end();

