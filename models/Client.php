<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;



class Client extends ActiveRecord
{   

    public function rules()
    {
        return [
            [['id','e_mail', 'rg','nome'], 'safe'],
            [['e_mail', 'rg','nome'], 'required'],
            [['rg','id'], 'integer'],
            [['e_mail'], 'email'],
        ];
    }

    public static function tableName()
    {
        return 'client';
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setNome($value)
    {
        $this->nome = $value;
    }

    public function setEmail($value)
    {
        $this->e_mail = $value;
    }
    
    public function setRg($value)
    {
        $this->rg = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->e_mail;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public static function getDb()
    {
        return \Yii::$app->db2;
    }

    public function relations()
    {
        return [
            'address' => [self::HAS_MANY, 'Address', 'client_id'],
        ];
    }
}
