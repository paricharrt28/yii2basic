<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use yii\web\JsExpression;
?>

<div class="alert alert-dismissible alert-primary">
    <h1 class="display-3"><?= $data['meeting_list_name'] ?></h1><strong>อบรมหัวข้อ</strong>
</div>
<?php
$form = ActiveForm::begin([
                #'layout' => ActiveForm::LAYOUT_HORIZONTAL,
        ]);
//print_r($form->errorSummary($model));
?>
<div class="row">
    <div class="col-md-4">
        <?php
        echo $form->field($model2, 'meeting_register_cid')->widget(MaskedInput::className(), [
            'mask' => '9-9999-99999-99-9',
            'clientOptions' => [
                'removeMaskOnSubmit' => true,
            ]
        ])
        ?>
    </div>
    <div class="col-md-8">
        <?php echo $form->field($model2, 'meeting_register_name')->textInput() ?>

    </div>
    <div class="col-md-12">
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
    </div>
</div>




<div class="form-group">
    <?= Html::submitButton('บันทึก', ['class' => 'btn btn-danger']) ?>
</div>

<?php ActiveForm::end(); ?>
