<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use yii\web\JsExpression;
?>
<h2><?= $data['meeting_list_name'] ?></h2>
<?php
$form = ActiveForm::begin();
print_r($form->errorSummary($model));
?>
<?php
echo $form->field($model2, 'meeting_register_cid')->widget(MaskedInput::className(), [
    'mask' => '9-9999-99999-99-9',
    'clientOptions' => [
        'removeMaskOnSubmit' => true,
    ]
])
?>
<?php echo $form->field($model2, 'meeting_register_name')->textInput() ?>

<?php #echo $form->field($model2, 'meeting_register_hospcode')->textInput() ?>
<?php
echo $form->field($model2, 'meeting_register_hospcode')->widget(Select2::classname(), [
    'options' => ['multiple' => false, 'placeholder' => 'ค้นหาหน่วยบริการ ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 1,
        'language' => [
            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
        ],
        'ajax' => [
            'url' => ['hos-list'],
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }')
        ],
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('function(city) { return city.text; }'),
        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
    ],
]);
?>
<div class="form-group">
    <?= Html::submitButton('บันทึก', ['class' => 'btn btn-danger']) ?>
</div>

<?php ActiveForm::end(); ?>
