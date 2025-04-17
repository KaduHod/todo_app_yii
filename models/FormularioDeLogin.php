<?php
namespace app\models;
use Yii;
use yii\base\Model;

class FormularioDeLogin extends Model
{
    public $email;
    public $password;

    public function rules(){
        return [
            [["email", "password"], "required"],
            ["password", "string", "min" => 6, "max" => 40]
        ];
    }
}
