<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, "email") ?>
    <?= $form->field($model, "password")->passwordInput() ?>
    <div class="form-group">
        <?= Html::submitButton("Signin", ["class" => "btn btn-primary"]) ?>
    </div>
<?php ActiveForm::end(); ?>
<?= Html::a("Signup", ["user/signup"]) ?>

