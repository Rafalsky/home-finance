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

class m160105_202804_add_company_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'logo' => $this->string(255),
            'about' => $this->string(255),
            'nationality' => $this->integer(11),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%company}}');
    }
}
