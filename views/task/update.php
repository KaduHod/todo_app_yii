<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Update Task: ' . $model->title;
?>

<div class="task-update">
    <div class="task-form">
        <?php $form = ActiveForm::begin([
            "action" => "index.php?r=task/update&id=".$task->id,
            "method" => "POST"
        ]); ?>
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'completed')->checkbox() ?>
        <?= $form->field($model, 'due_date')->textInput(['type' => 'date', "value" => date('Y-m-d', strtotime($task->due_date))]) ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-secondary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
