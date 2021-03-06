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

class m160213_194549_add_category_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'hash' => $this->string(23)->notNull(),
            'name' => $this->string(255),
            'type' => $this->integer(11),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);
        $this->createIndex('category_hash', '{{%category}}', ['hash'], true);
    }

    public function down()
    {
        $this->dropIndex('category_hash', '{{%category}}');
        $this->dropTable('{{%category}}');
    }
}
