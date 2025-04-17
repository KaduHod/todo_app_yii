<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, "nome")->label("Exemplo de label") ?>
    <?= $form->field($model, "e_mail") ?>
    <div class="form-group">
        <?= Html::submitButton("Enviar", ["class" => "btn btn-primary"]) ?>
    </div>
<?php ActiveForm::end(); ?>
