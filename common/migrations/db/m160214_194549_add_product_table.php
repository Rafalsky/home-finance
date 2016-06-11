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

class m160214_194549_add_product_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => Schema::TYPE_PK,
            'shop_id' => Schema::TYPE_INTEGER,
            'company_id' => Schema::TYPE_INTEGER,
            'category_id' => Schema::TYPE_INTEGER,
            'unit' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING,
            'image_base_url' => 'VARCHAR(1024)',
            'image_path' => 'VARCHAR(1024)',
            'description' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME,
        ]);
        $this->addForeignKey('fk_product_price_shop', '{{%product}}', 'shop_id', '{{%shop}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_product_price_company', '{{%product}}', 'company_id', '{{%company}}', 'id', 'SET NULL', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_product_price_shop', '{{%product}}');
        $this->dropForeignKey('fk_product_price_shop', '{{%product}}');
        $this->dropTable('{{%product}}');
    }
}
