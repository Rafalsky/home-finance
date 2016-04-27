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

class TimelineEventQuery extends ActiveQuery
{
    public function today()
    {
        $this->andWhere(['>=', 'created_at', strtotime('today midnight')]);
        return $this;
    }
}
