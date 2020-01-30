<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?= $data['meeting_list_name'] ?>
<?php $form = ActiveForm::begin();
?>
<?php echo $form->field($model, 'meeting_register_id')->textInput() ?>
<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
