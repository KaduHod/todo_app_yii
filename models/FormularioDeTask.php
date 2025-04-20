<?php
namespace app\models;
use Yii;
use yii\base\Model;

class FormularioDeTask extends Model
{
    public $title;
    public $description;
    public $due_date;
    public $completed;
    public $id;
    public function rules() {
        return [
            [["title", "description","due_date","completed"], "required"],
            ["completed", "boolean"],
            ['due_date', 'date', 'format' => 'php:Y-m-d'],
            ["description", "string", "max" => 255],
            ["title", "string", "max" => 20]
        ];
    }
}
