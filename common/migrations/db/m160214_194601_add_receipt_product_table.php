<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use yii\db\Migration;

class m160214_194601_add_receipt_product_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%receipt_product}}', [
            'id' => $this->primaryKey(),
            'receipt_id' => $this->integer(11)->notNull(),
            'product_id' => $this->integer(11)->notNull(),
            'count' => 'FLOAT(14,4)',
            'total_price' => 'DECIMAL(10, 2)',
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ], $tableOptions);
        $this->addForeignKey('fk_receipt_product_receipt', '{{%receipt_product}}', 'receipt_id', '{{%receipt}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_receipt_product_product', '{{%receipt_product}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_receipt_product_product', '{{%receipt_product}}');
        $this->dropForeignKey('fk_receipt_product_receipt', '{{%receipt_product}}');
        $this->dropTable('{{%receipt_product}}');
    }
}
