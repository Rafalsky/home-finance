<?php

use yii\db\Migration;

class m160610_222420_add_wallet_category_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%wallet_category}}', [
            'id' => $this->primaryKey(),
            'wallet_id' => $this->integer(11),
            'category_id' => $this->integer(11)
        ]);
        $this->addForeignKey('fk_wallet_category_wallet', '{{%wallet_category}}', 'wallet_id', '{{%wallet}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_wallet_category_category', '{{%wallet_category}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_wallet_category_category', '{{%wallet_category}}');
        $this->dropForeignKey('fk_wallet_category_wallet', '{{%wallet_category}}');
        $this->dropTable('{{%wallet_category}}');
    }
}
