<?php

use yii\db\Migration;

/**
 * Class m200110_174829_type
 */
class m200110_174829_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('type', [
            'id' => 'pk',
            'description' => 'string NOT NULL',
            ]); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_174829_type cannot be reverted.\n";

        return false;
    }
    */
}
