<?php

use yii\db\Migration;

class m160213_224424_add_product_unit_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%product_unit}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'wallet_id' => $this->integer(11),
            'is_live' => $this->boolean()->defaultValue(false),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
            'translations' => 'JSON'
        ]);
        $this->batchInsert(
            '{{%product_unit}}',
            ['name', 'is_live', 'created_at'],
            [
                ['kg', 1, new \yii\db\Expression('NOW()')],
                ['g', 1, new \yii\db\Expression('NOW()')],
                ['l', 1, new \yii\db\Expression('NOW()')],
                ['ml', 1, new \yii\db\Expression('NOW()')],
                ['item', 1, new \yii\db\Expression('NOW()')],
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%product_unit}}');
    }
}
