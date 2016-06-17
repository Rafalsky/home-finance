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

class m160108_214500_add_receipt_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%receipt}}', [
            'id' => $this->primaryKey(),
            'shop_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'wallet_id' => $this->integer(11)->notNull(),
            'date' => $this->dateTime()->notNull(),
            'is_live' => $this->boolean()->notNull()->defaultValue(false),
            'notes' => $this->text(),
            'image_base_url' => $this->string(1024),
            'image_path' => $this->string(1024),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);
        $this->addForeignKey('fk_receipt_shop', '{{%receipt}}', 'shop_id', '{{%shop}}', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_receipt_shop', '{{%receipt}}');
        $this->dropTable('{{%receipt}}');
    }
}
