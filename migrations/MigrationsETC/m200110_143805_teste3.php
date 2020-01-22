<?php

use yii\db\Migration;

/**
 * Class m200110_143805_teste3
 */
class m200110_143805_teste3 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pais2', [
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
       // echo "m200110_143805_teste3 cannot be reverted.\n";
            $this->dropTable('pais2');
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_143805_teste3 cannot be reverted.\n";

        return false;
    }
    */
}
