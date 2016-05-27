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
use \yii\db\mysql\Schema;

class m160214_194601_add_receipt_product_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%receipt_product}}', [
            'id' => Schema::TYPE_PK,
            'receipt_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'product_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'count' => 'FLOAT(7,4)',
            'total_price' => 'DECIMAL(10, 2)',
            'created_at' => Schema::TYPE_DATETIME.' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME
        ]);
        $this->addForeignKey('fk_receipt_product_receipt', 'receipt_product', 'receipt_id', 'receipt', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_receipt_product_product', 'receipt_product', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_receipt_product_product', 'receipt_product');
        $this->dropForeignKey('fk_receipt_product_receipt', 'receipt_product');
        $this->dropTable('{{%receipt_product}}');
    }
}
