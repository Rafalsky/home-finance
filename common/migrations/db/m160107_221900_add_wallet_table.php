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

class m160107_221900_add_wallet_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%wallet}}', [
            'id' => $this->primaryKey(),
            'hash' => $this->string(23)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'currency' => $this->char(3),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ], $tableOptions);
        $this->createIndex('wallet_hash', '{{%wallet}}', ['hash'], true);
        $this->addForeignKey('fk_wallet_user', '{{%wallet}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_wallet_user', '{{%wallet}}');
        $this->dropIndex('wallet_hash', '{{%wallet}}');
        $this->dropTable('{{%wallet}}');
    }
}
