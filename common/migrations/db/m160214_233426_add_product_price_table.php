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

class m160214_233426_add_product_price_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_price}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'receipt_id' => $this->integer(11),
            'price' => 'DECIMAL(10, 2)',
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ], $tableOptions);
        $this->addForeignKey('fk_product_price_product', '{{%product_price}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_product_price_receipt', '{{%product_price}}', 'receipt_id', '{{%receipt}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_product_price_receipt', '{{%product_price}}');
        $this->dropForeignKey('fk_product_price_product', '{{%product_price}}');
        $this->dropTable('{{%product_price}}');
    }
}
