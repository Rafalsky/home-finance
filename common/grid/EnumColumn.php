<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\grid;

use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;

/**
 * Class EnumColumn
 * [
 *      'class' => 'common\grid\EnumColumn',
 *      'attribute' => 'role',
 *      'enum' => User::getRoles()
 * ]
 * @package common\components\grid
 */
class EnumColumn extends DataColumn
{
    /**
     * @var array List of value => name pairs
     */
    public $enum = [];
    /**
     * @var bool
     */
    public $loadFilterDefaultValues = true;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->loadFilterDefaultValues && $this->filter === null) {
            $this->filter = $this->enum;
        }
    }

    /**
     * @param mixed $model
     * @param mixed $key
     * @param int $index
     * @return mixed
     * @throws \yii\base\InvalidParamException
     */
    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);
        return ArrayHelper::getValue($this->enum, $value, $value);
    }
}
