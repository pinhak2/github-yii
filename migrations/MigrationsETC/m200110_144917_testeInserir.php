<?php

use yii\db\Migration;

/**
 * Class m200110_144917_testeInserir
 */
class m200110_144917_testeInserir extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this-> insert('pais3', [
            'codigo' => 'codigo1',
            'nome' => 'nome1',
            'populacao' => 'populacao1',
            ]); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m200110_144917_testeInserir cannot be reverted.\n";
        $this-> delete('pais3', [
            'codigo'=>'codigo1'
        ]);
       // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_144917_testeInserir cannot be reverted.\n";

        return false;
    }
    */
}
