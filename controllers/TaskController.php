<?php

namespace app\controllers;

use app\models\FormularioDeTask;
use app\models\Task;
use Yii;
use yii\helpers\VarDumper;

class TaskController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        $userTasks = Task::find()->where(["user_id" => $user->id])->all();
        $form = new FormularioDeTask();
        return $this->render("index", ["model" => $form, "tasks" => $userTasks]);
    }
    public function actionCreate() {
        $user = Yii::$app->user->identity;
        $form = new FormularioDeTask();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $task = new Task();
            $task->setAttributes($form->getAttributes(), []);
            $task->user_id = intval($user->id);
            $task->due_date = $form->getAttributes()["due_date"];
            $task->save();
        }
        return $this->redirect("/index.php?r=task/index");
    }
    public function actionUpdate($id) {
        $task = Task::findOne($id);
        $form = new FormularioDeTask();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $data = $form->getAttributes();
            unset($data['id'], $data['user_id'], $data['created_at'], $data['updated_at']);
            $task->setAttributes($data, false);
            $user = Yii::$app->user->identity;
            $task->update();
            $userTasks = Task::find()->where(["user_id" => $user->id])->all();
            return $this->render("/task/index", ["model" => $form, "tasks" => $userTasks]);
        }
        $form->setAttributes($task->getAttributes());
        return $this->render("update", ["model" => $form, "task" => $task]);
    }
    public function actionDelete($id) {
        $task = Task::findOne($id);
        $task->delete();
        return $this->redirect("/index.php?r=task/index");
    }
}
