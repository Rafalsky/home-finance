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

class m150929_074021_article_attachment_order extends Migration
{
    public function up()
    {
        $this->addColumn('{{%article_attachment}}', 'order', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('{{%article_attachment}}', 'order');
    }
}
