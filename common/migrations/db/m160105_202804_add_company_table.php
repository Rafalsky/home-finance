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

class m160105_202804_add_company_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%company}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'logo' => Schema::TYPE_STRING,
            'about' => Schema::TYPE_STRING,
            'nationality' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_DATETIME.' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%company}}');
    }
}
