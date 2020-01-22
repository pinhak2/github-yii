<?php

namespace app\models;

use yii\db\ActiveRecord;

class Pais extends ActiveRecord
{
  
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return 'pais';
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getPopulacao()
    {
        echo ('populacao');
        return $this->populacao;
    }
}