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

class m160214_233426_add_product_price_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%product_price}}', [
            'id' => Schema::TYPE_PK,
            'product_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'receipt_id' => Schema::TYPE_INTEGER,
            'price' => 'DECIMAL(10, 2)',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME
        ]);
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
