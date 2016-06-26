<?php

use yii\db\Migration;

class m160625_000338_add_transaction_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%transaction}}', [
            'id' => $this->primaryKey(),
            'type' => $this->integer(4)->notNull(),
            'wallet_id' => $this->integer(11)->notNull(),
            'receipt_id' => $this->integer(11),
            'price' => 'DECIMAL(10, 2)',
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%transaction}}');
    }
}
