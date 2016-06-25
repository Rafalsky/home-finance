<?php

use yii\db\Migration;

class m160625_000338_add_transaction_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%transaction}}', [
            'id' => $this->primaryKey(),
            'type' => $this->integer(4)->notNull(),
            'wallet_id' => $this->integer(11)->notNull(),
            'receipt_id' => $this->integer(11),
            'price', // amount? not null
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%transaction}}');
    }
}
