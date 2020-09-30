<?php

use yii\db\Migration;

/**
 * Class m200929_203944_create_table_order_goods
 */
class m200929_203944_create_table_order_goods extends Migration
{
    private $tableName = 'order_goods';

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'order_id' => $this->integer(),
            'good_id' => $this->integer(),
            'number' => $this->integer(),
        ]);


        $this->addForeignKey(
            'fk-order_id',
            $this->tableName,
            'order_id',
            'orders',
            'order_id',
        );

        $this->addForeignKey(
            'fk-good_id',
            $this->tableName,
            'good_id',
            'goods',
            'good_id',
        );
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
        // echo "m200929_203944_create_table_order_goods cannot be reverted.\n";

        // return false;
    }
}
