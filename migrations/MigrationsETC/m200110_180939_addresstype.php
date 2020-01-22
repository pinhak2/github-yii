<?php

use yii\db\Migration;

/**
 * Class m200110_180939_address_type
 */
class m200110_180939_addresstype extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('addresstype', [
            'id' => 'pk',
            'address_id' => 'int(11) NOT NULL',
            'type_id' => 'int(11) NOT NULL',
            ]);

        $this->addForeignKey('fk_address', 'addresstype', 'address_id', 'adress', 'id');
        $this->addForeignKey('fk_type', 'addresstype', 'type_id', 'type', 'id');  
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('addresstype');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_180939_address_type cannot be reverted.\n";

        return false;
    }
    */
}
