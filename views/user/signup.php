<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, "name") ?>
    <?= $form->field($model, "email") ?>
    <?= $form->field($model, "password")->passwordInput() ?>
    <?= $form->field($model, "confirmPassword")->passwordInput() ?>
    <div class="form-group">
        <?= Html::submitButton("Save", ["class" => "btn btn-primary"]) ?>
    </div>
<?php ActiveForm::end(); ?>
