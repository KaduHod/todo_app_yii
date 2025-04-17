<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class Task extends ActiveRecord
{
    public static function tableName()
    {
        return 'task';
    }
}
