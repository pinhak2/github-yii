<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;



class Type extends ActiveRecord
{   
    public function rules()
    {
        return [
            [[ 'id','description'], 'safe'],
        ];
    }

    public static function tableName()
    {
        return 'type';
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public static function getDb()
    {
        return \Yii::$app->db2;
    }
}
