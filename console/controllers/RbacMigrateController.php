<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace console\controllers;

use yii\console\controllers\MigrateController;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class RbacMigrateController extends MigrateController
{
    /**
     * Creates a new migration instance.
     * @param string $class the migration class name
     * @return \common\rbac\Migration the migration instance
     */
    protected function createMigration($class)
    {
        $file = $this->migrationPath.DIRECTORY_SEPARATOR.$class.'.php';
        require_once($file);

        return new $class();
    }
}
