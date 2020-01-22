<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;



class AddressType extends ActiveRecord
{   
    public function rules()
    {
        return [
            [['id', 'address_id', 'type_id'], 'safe'],
        ];
    }

    public static function tableName()
    {
        return 'addresstype';
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setAddressId($value)
    {
        $this->address_id = $value;
    }

    public function getAddressId()
    {
        return $this->address_id;
    }

    public function setTypeId($value)
    {
        $this->type_id = $value;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public static function getDb()
    {
        return \Yii::$app->db2;
    }
}
