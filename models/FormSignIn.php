<?php
namespace app\models;
use Yii;
use yii\base\Model;

class FormSignIn extends Model
{
    public $email;
    public $password;

    public function rules(){
        return [
            [["email", "password"], "required"],
            ["password", "string", "min" => 6, "max" => 40],
            ["email", "exist", "targetAttribute" => "email", "targetClass" => User::class, "message" => "Usuário não encontrado!"]
        ];
    }
    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            if ($this->email) {
                $this->email = strtolower($this->email);
            }
            return true;
        }
        return false;
    }
}
