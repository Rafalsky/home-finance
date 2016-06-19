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

class m160106_210354_add_shop_model extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%shop}}', [
            'id' => $this->primaryKey(),
            'hash' => $this->string(23)->notNull(),
            'company_id' => $this->integer(11),
            'name' => $this->string(255)->notNull(),
            'address' => $this->string(255),
            'city' => $this->string(255),
            'comment' => $this->text(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);
        $this->createIndex('shop_hash', '{{%shop}}', ['hash'], true);
        $this->addForeignKey('fk_shop_company', '{{%shop}}', 'company_id', '{{%company}}', 'id', 'SET NULL', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_shop_company', '{{%shop}}');
        $this->dropIndex('shop_hash', '{{%shop}}');
        $this->dropTable('{{%shop}}');
    }
}
