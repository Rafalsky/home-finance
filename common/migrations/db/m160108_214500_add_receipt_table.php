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

class m160108_214500_add_receipt_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%receipt}}', [
            'id' => Schema::TYPE_PK,
            'shop_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'wallet_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'date' => Schema::TYPE_DATETIME.' NOT NULL',
            'is_live' => Schema::TYPE_BOOLEAN.' NOT NULL DEFAULT 0',
            'comment' => Schema::TYPE_TEXT,
            'image' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_DATETIME.' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME
        ]);
        $this->addForeignKey('fk_receipt_shop', 'receipt', 'shop_id', 'shop', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_receipt_shop', 'receipt');
        $this->dropTable('{{%receipt}}');
    }
}
