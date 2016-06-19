<?php

/*
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @property string $hash
 */

namespace common\models\base;

abstract class HashedModel extends TimestampedModel
{
    public function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->hash = uniqid('', true);
        }
        return parent::beforeValidate();
    }
}
