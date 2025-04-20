<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="task-list">
    <h2>Task List</h2>

    <?php if (!empty($tasks)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= Html::encode($task->title) ?></td>
                    <td><?= Html::encode($task->description) ?></td>
                    <td><?= $task->completed ? 'Completed' : 'Pending' ?></td>
                    <td><?= Yii::$app->formatter->asDate($task->due_date) ?></td>
                    <td>
                        <?= Html::a('Edit', ['/task/update', 'id' => $task->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= Html::a('Delete', ['/task/delete', 'id' => $task->id], [
                            'class' => 'btn btn-sm btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this task?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">
            No tasks found. Create a new task using the form below.
        </div>
    <?php endif; ?>
</div>

<hr>
<?= "<h1>Create your task</h1>" ?>

<?php $form = ActiveForm::begin([
        "action" => "/index.php?r=task/create"
    ]); ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'description')->textarea() ?>
    <?= $form->field($model, 'completed')->checkbox() ?>
    <?= $form->field($model, 'due_date')->textInput(["type" => "date"]) ?>
    <div class="form-group">
        <?= Html::submitButton("Save", ["class" => "btn btn-primary"]) ?>
    </div>
<?php ActiveForm::end(); ?>

