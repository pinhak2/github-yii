<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m200110_145505_testeInserirPais
 */
class m200110_145505_testeInserirPais extends Migration
{

    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('pais', [
            'codigo' => 'JM',
            'nome' => 'Jamaica',
            'populacao' => '8293404',
            ]); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this-> delete('pais', ['codigo' => 'JM']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_145505_testeInserirPais cannot be reverted.\n";

        return false;
    }
    */
}
