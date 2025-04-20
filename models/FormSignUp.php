<?php
namespace app\models;

use Yii;

use yii\base\Model;
use app\models\User;

class FormSignUp extends Model
{
    public $name;
    public $email;
    public $password;
    public $confirmPassword;
    public function rules(){
        return [
            [["name", "email", "password", "confirmPassword"], "required"],
            ["email", "email"],
            [["password", "confirmPassword"], "string", "min" => 6, "max" => 40],
            ["password", "compare", "compareAttribute" => "confirmPassword"],
            ["email", "unique", "targetAttribute" => "email", "targetClass" => User::class, "message" => "Email não está disponível!"]
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
