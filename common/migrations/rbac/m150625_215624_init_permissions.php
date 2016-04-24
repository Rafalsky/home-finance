<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use common\rbac\Migration;

class m150625_215624_init_permissions extends Migration
{
    public function up()
    {
        $managerRole = $this->auth->getRole(\common\models\User::ROLE_MANAGER);

        $loginToBackend = $this->auth->createPermission('loginToBackend');
        $this->auth->add($loginToBackend);
        $this->auth->addChild($managerRole, $loginToBackend);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getPermission('loginToBackend'));
    }
}
