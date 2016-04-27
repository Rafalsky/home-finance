<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models\query;

use yii\db\ActiveQuery;

/**
 * Class UserTokenQuery
 * @package common\models\query
 * @author Eugene Terentev <eugene@terentev.net>
 */
class UserTokenQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function notExpired()
    {
        $this->andWhere(['>', 'expire_at', time()]);
        return $this;
    }

    /**
     * @param $type
     * @return $this
     */
    public function byType($type)
    {
        $this->andWhere(['type' => $type]);
        return $this;
    }

    /**
     * @param $token
     * @return $this
     */
    public function byToken($token)
    {
        $this->andWhere(['token' => $token]);
        return $this;
    }
}
