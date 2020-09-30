<?php

use yii\db\Migration;

/**
 * Class m200929_203931_create_table_orders
 */
class m200929_203931_create_table_orders extends Migration
{
    private $tableName = 'orders';

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'order_id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'description' => $this->text(),
            'status' => $this->integer(),
            'created_at' => $this->datetime(),
            'status_change' => $this->datetime(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
        //echo "m200929_203931_create_table_orders cannot be reverted.\n";
        
        //return false;
    }
}
