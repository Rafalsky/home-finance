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

class m160610_213702_add_payment_account_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%payment_account}}', [
            'id' => $this->primaryKey(),
            'wallet_id' => $this->integer(11),
            'name' => $this->string(255),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);
        $this->addForeignKey('fk_payment_account_wallet', '{{%payment_account}}', 'wallet_id', '{{%wallet}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_payment_account_wallet', '{{%payment_account}}');
        $this->dropTable('{{%payment_account}}');
    }
}
