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

class m160214_194549_add_product_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'shop_id' => $this->integer(11),
            'company_id' => $this->integer(11),
            'category_id' => $this->integer(11),
            'product_unit_id' => $this->integer(11),
            'name' => $this->string(255),
            'image_base_url' => $this->string(1024),
            'image_path' => $this->string(1024),
            'description' => $this->text(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);
        $this->addForeignKey('fk_product_price_shop', '{{%product}}', 'shop_id', '{{%shop}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_product_price_company', '{{%product}}', 'company_id', '{{%company}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_product_product_unit', '{{%product}}', 'product_unit_id', '{{%product_unit}}', 'id', 'SET NULL', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_product_product_unit', '{{%product}}');
        $this->dropForeignKey('fk_product_price_shop', '{{%product}}');
        $this->dropForeignKey('fk_product_price_shop', '{{%product}}');
        $this->dropTable('{{%product}}');
    }
}
