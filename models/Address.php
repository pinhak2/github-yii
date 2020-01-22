<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;



class Address extends ActiveRecord
{    const UPDATE_TYPE_CREATE = 'create';
    const UPDATE_TYPE_UPDATE = 'update';
    const UPDATE_TYPE_DELETE = 'delete';

    const SCENARIO_BATCH_UPDATE = 'batchUpdate';

    private $updateType;

    public function rules()
    {
        return [
            [['id','street', 'number','neighborhood','active','client_id'], 'safe'],
            [['street', 'number','neighborhood','active'], 'required'],
            ['id','unique'],
            ['updateType', 'required', 'on' => self::SCENARIO_BATCH_UPDATE],
            ['updateType',
                'in',
                'range' => [self::UPDATE_TYPE_CREATE, self::UPDATE_TYPE_UPDATE, self::UPDATE_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_UPDATE
            ],
            ['client_id', 'required', 'except' => self::SCENARIO_BATCH_UPDATE],
            [['number','id','client_id','type_id'], 'integer'],
            [['active'], 'boolean'],
        ];
    }


    public function getUpdateType()
    {
        if (empty($this->updateType)) {
            if ($this->isNewRecord) {
                $this->updateType = self::UPDATE_TYPE_CREATE;
            } else {
                $this->updateType = self::UPDATE_TYPE_UPDATE;
            }
        }

        return $this->updateType;
    }

    public function setUpdateType($value)
    {
        $this->updateType = $value;
    }


    public static function tableName()
    {
        return 'address';
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setStreet($value)
    {
        $this->street = $value;
    }

    public function setNumber($value)
    {
        $this->number = $value;
    }
    
    public function setNeighborhood($value)
    {
        $this->neighborhood = $value;
    }

    public function setActive($value)
    {
        $this->active = $value;
    }

    public function setClient_Id($value)
    {
        $this->client_id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getClient_Id()
    {
        return $this->client_id;
    }

    public static function getDb()
    {
        return \Yii::$app->db2;
    }

    public function setTypeId($value)
    {
        $this->type_id = $value;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function relations()
    {
        return [
            'client' => [self::BELONGS_TO, 'Client', 'client_id'],
        ];
    }

}
