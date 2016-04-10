<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160107_221900_add_wallet_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%wallet}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME
        ]);
        $this->addForeignKey('fk_wallet_user', 'wallet', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_wallet_user', 'wallet');
        $this->dropTable('{{%wallet}}');
    }
}
