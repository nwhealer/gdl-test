<?php

use yii\db\Migration;

/**
 * Class m200929_203919_create_table_goods
 */
class m200929_203919_create_table_goods extends Migration
{
    private $tableName = 'goods';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'good_id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'images' => $this->text(),
            'balance' => $this->integer(),
            'price' => $this->decimal(19,2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
