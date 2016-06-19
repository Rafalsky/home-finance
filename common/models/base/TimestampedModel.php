<?php
/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models\base;

use yii\db\Expression;

/**
 * @property string $created_at
 * @property string $updated_at
 */
abstract class TimestampedModel extends BaseModel
{
    public function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->created_at = new Expression('NOW()');
        } else {
            $this->updated_at = new Expression('NOW()');
        }
        return parent::beforeValidate();
    }
}
