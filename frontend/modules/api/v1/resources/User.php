<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace frontend\modules\api\v1\resources;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class User extends \common\models\User
{
    public function fields()
    {
        return ['id', 'username', 'created_at'];
    }

    public function extraFields()
    {
        return ['userProfile'];
    }
}
