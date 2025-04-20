<?php
namespace app\controllers;

use Yii;
use app\models\User;
use app\models\FormSignIn;
use app\models\FormSignUp;

class UserController extends \yii\web\Controller
{
    public function actionSignup() {
        $formulario = new FormSignUp();
        $user = new User();
        if(Yii::$app->request->post() && $formulario->load(Yii::$app->request->post()) && $formulario->validate()) {
            $data = $formulario->toArray();
            $hash = Yii::$app->getSecurity()->generatePasswordHash($data["password"]);
            $data["password"] = $hash;
            $data["email"] = strtolower($data["email"]);
            $user->setAttributes($data, []);
            if(!$user->save()) {
                return $this->render("signup", ["model" => $formulario]);
            }
            return $this->redirect("/signin", 302);
        }
        return $this->render("signup", ["model" => $formulario]);
    }
    public function actionSignin() {
        $form = new FormSignIn();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $user = User::findOne(["email" => strtolower($form->email)]);
            if($user && Yii::$app->getSecurity()->validatePassword($form->password, $user->password)) {
                Yii::$app->user->login($user, 3600*24*30);
                return $this->redirect(["task/index"]);
            }
        }
        return $this->render("signin", ["model" => $form]);
    }
}

