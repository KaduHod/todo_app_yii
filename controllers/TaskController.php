<?php

namespace app\controllers;

use app\models\FormPutTask;
use app\models\Task;
use Yii;

class TaskController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $userTasks = Yii::$app->session->get("tasks");
        if(!$userTasks) {
            $this->updateSessionTasks();
        }
        $form = new FormPutTask();
        return $this->render("index", ["model" => $form]);
    }
    private function updateSessionTasks() {
        $userTasks = Task::find()->where(["user_id" => Yii::$app->user->identity->id])->all();
        Yii::$app->session->set("tasks", $userTasks);
    }
    public function actionCreate() {
        $user = Yii::$app->user->identity;
        $form = new FormPutTask();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $task = new Task();
            $task->setAttributes($form->getAttributes(except: ["id"]), false);
            $task->user_id = intval($user->id);
            unset($task->id);
            $task->due_date = $form->getAttributes()["due_date"];
            $task->insert();
            $this->updateSessionTasks();
        }
        return $this->redirect(["task/index"]);
    }
    public function actionUpdate($id) {
        $task = Task::findOne($id);
        $form = new FormPutTask();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $data = $form->getAttributes();
            unset($data['id'], $data['user_id'], $data['created_at'], $data['updated_at']);
            $task->setAttributes($data, false);
            $task->update();
            $this->updateSessionTasks();
            return $this->redirect(["task/index"]);
        }
        $form->setAttributes($task->getAttributes());
        return $this->render("update", ["model" => $form, "task" => $task]);
    }
    public function actionDelete($id) {
        $task = Task::findOne($id);
        $task->delete();
        $this->updateSessionTasks();
        return $this->redirect(["task/index"]);
    }
}
?>
