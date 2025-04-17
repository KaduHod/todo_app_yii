<?php
namespace app\controllers;
use Yii;
use app\models\User;
use app\models\FormularioDeRegistroUser;
use app\models\FormularioDeLogin;

class UserController extends \yii\web\Controller
{
    public function actionIndex() {
    }
    public function actionRegistro() {
        $formulario = new FormularioDeRegistroUser();
        $user = new User();
        if(Yii::$app->request->post() && $formulario->load(Yii::$app->request->post()) && $formulario->validate()) {
            $data = $formulario->toArray();
            $hash = Yii::$app->getSecurity()->generatePasswordHash($data["password"]);
            $data["password"] = $hash;
            $data["email"] = strtolower($data["email"]);
            $user->setAttributes($data, []);
            if(!$user->save()) {
                return $this->render("registro", ["model" => $formulario]);
            }
            return $this->redirect("/login", 302);
        }
        return $this->render("registro", ["model" => $formulario]);
    }
    public function actionLogin() {
        $form = new FormularioDeLogin();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $user = User::findOne(["email" => strtolower($form->email)]);
            if($user && Yii::$app->getSecurity()->validatePassword($form->password, $user->password)) {
                Yii::$app->user->login($user, 3600*24*30);
                return $this->redirect("/", 302);
            }
        }
        return $this->render("login", ["model" => $form]);
    }
}

