<?php

use yii\db\Migration;

class m160624_232040_add_warranty_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%warranty}}', [
            'id' => $this->primaryKey(),
            'receipt_product_id' => $this->integer(11)->notNull(),
            'started' => $this->date()->notNull(),
            'ended' => $this->date()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);
        $this->addForeignKey('warranty_receipt_product', '{{%warranty}}', 'receipt_product_id', '{{%receipt_product}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('warranty_receipt_product', '{{%warranty}}');
        $this->dropTable('{{%warranty}}');
    }
}