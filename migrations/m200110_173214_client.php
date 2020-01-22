<?php

use yii\db\Migration;

/**
 * Class m200110_173214_client
 */
class m200110_173214_client extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('client', [
            'id' => 'pk',
            'nome' => 'string NOT NULL',
            'e_mail' => 'string NOT NULL',
            'rg' => 'int(8)',
            ]); 
    }

    public function safeDown()
    {
        $this->dropTable('client');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_173214_client cannot be reverted.\n";

        return false;
    }
    */
}
