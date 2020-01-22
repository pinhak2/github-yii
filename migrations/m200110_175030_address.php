<?php

use yii\db\Migration;

/**
 * Class m200110_175030_address
 */
class m200110_175030_address extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('address', [
            'id' => 'pk',
            'street' => 'string NOT NULL',
            'number' => 'int(11) NOT NULL',
            'neighborhood' => 'string NOT NULL',
            'active' => 'boolean NOT NULL',
            'client_id' => 'int(11) NOT NULL',
            'type_id' => 'int(11) NOT NULL',
            ]);

        $this->addForeignKey('fk_client', 'address', 'client_id', 'client', 'id');     
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('address');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_175030_address cannot be reverted.\n";

        return false;
    }
    */
}
