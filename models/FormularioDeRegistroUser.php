<?php
namespace app\models;

use Yii;

use yii\base\Model;

class FormularioDeRegistroUser extends Model
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
        ];
    }
}
