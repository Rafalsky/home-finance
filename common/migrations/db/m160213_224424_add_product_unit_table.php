<?php

use yii\db\Migration;

class m160213_224424_add_product_unit_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%product_unit}}', [
            'id' => $this->primaryKey(),
            'hash' => $this->string(23)->notNull(),
            'name' => $this->string(255),
            'wallet_id' => $this->integer(11),
            'is_live' => $this->boolean()->defaultValue(false),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
            'translations' => 'JSON'
        ]);
        $this->createIndex('product_unit_hash', '{{%product_unit}}', ['hash'], true);
        $this->batchInsert(
            '{{%product_unit}}',
            ['hash', 'name', 'is_live', 'created_at'],
            [
                [uniqid('', true), 'kg', 1, new \yii\db\Expression('NOW()')],
                [uniqid('', true), 'g', 1, new \yii\db\Expression('NOW()')],
                [uniqid('', true), 'l', 1, new \yii\db\Expression('NOW()')],
                [uniqid('', true), 'ml', 1, new \yii\db\Expression('NOW()')],
                [uniqid('', true), 'item', 1, new \yii\db\Expression('NOW()')],
            ]
        );
    }

    public function down()
    {
        $this->dropIndex('product_unit_hash', '{{%product_unit}}');
        $this->dropTable('{{%product_unit}}');
    }
}
