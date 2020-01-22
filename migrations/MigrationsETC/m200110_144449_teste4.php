<?php

use yii\db\Migration;

/**
 * Class m200110_144449_teste4
 */
class m200110_144449_teste4 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pais3', [
            'codigo' => 'string NOT NULL',
            'nome' => 'string NOT NULL',
            'populacao' => 'int(11) NOT NULL',
            ]); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // echo "m200110_144449_teste4 cannot be reverted.\n";
        $this->dropTable('pais3');
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_144449_teste4 cannot be reverted.\n";

        return false;
    }
    */
}
