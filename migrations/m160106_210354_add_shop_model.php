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

class m160106_210354_add_shop_model extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%shop}}', [
            'id' => Schema::TYPE_PK,
            'company_id' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'address' => Schema::TYPE_STRING,
            'city' => Schema::TYPE_STRING,
            'comment' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME
        ]);
        $this->addForeignKey('fk_shop_company', 'shop', 'company_id', 'company', 'id', 'SET NULL', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_shop_company', 'shop');
        $this->dropTable('{{%shop}}');
    }
}
