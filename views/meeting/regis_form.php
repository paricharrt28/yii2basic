<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h2><?= $data['meeting_list_name'] ?></h2>
<?php
$form = ActiveForm::begin();
print_r($form->errorSummary($model));
?>
<?php echo $form->field($model2, 'meeting_register_cid')->textInput() ?>
<?php echo $form->field($model2, 'meeting_register_name')->textInput() ?>
<?php echo $form->field($model2, 'meeting_register_hospcode')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton('บันทึก', ['class' => 'btn btn-danger']) ?>
</div>

<?php ActiveForm::end(); ?>
