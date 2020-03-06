<?php

use yii\bootstrap4\Html;
use kartik\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'responsiveWrap' => false,
    'showPageSummary' => true,
    'toolbar' => [
        '{export}',
        '{toggleData}'
    ],
    'panel' => [
        'type' => 'primary',
        'heading' => 'สรุปตามหัวข้อประชุมและหน่วยงาน',
    ],
    'columns' => [
        [
            'label' => 'หัวข้อการประชุม',
            'attribute' => 'listname',
            'group' => true, // enable grouping
            'groupFooter' => function ($model, $key, $index, $widget) { // Closure method
                return [
                    //'mergeColumns' => [[1, 3]], // columns to merge in summary
                    'content' => [// content to show in each summary cell
                        1 => 'รวม',
                        3 => GridView::F_SUM,
                    ],
                    'contentFormats' => [// content reformatting for each summary cell
                        3 => ['format' => 'number', 'decimals' => 0],
                    ],
                    'contentOptions' => [// content html attributes for each summary cell
                        1 => ['style' => 'font-variant:small-caps'],
                        3 => ['style' => 'text-align:right'],
                    ],
                    // html attributes for group summary row
                    'options' => ['class' => 'info table-default', 'style' => 'font-weight:bold;']
                ];
            }
        ],
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '5%'
        ],
        [
            'label' => 'หน่วยงาน',
            'attribute' => 'hosname',
        ],
        [
            'label' => 'จำนวนผู้เข้าร่วม',
            'attribute' => 'cc',
            'hAlign' => 'right',
            'pageSummary' => true
        ],
    ],
]);
