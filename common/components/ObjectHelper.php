<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\components;

trait ObjectHelper
{
    public function getShortClassName()
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
