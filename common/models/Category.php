<?php
/**
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models;

use yii\db\Expression;

class Category extends \common\models\base\Category implements CategoryType
{
    public static function getReceiptCategories()
    {
        $categories = [];
        foreach (self::find()->where(['type' => Category::RECEIPT_CATEGORY])->all() as $category) {
            $categories[$category->id] = $category->name;
        }
        return $categories;
    }

    public function getTypes()
    {
        return [
            self::RECEIPT_CATEGORY => \Yii::t('wallet', 'Receipt category')
        ];
    }
    
    public function beforeValidate()
    {
        $this->updateTimestamps();
        return parent::beforeValidate();
    }

    private function updateTimestamps()
    {
        if ($this->isNewRecord) {
            $this->created_at = new Expression('NOW()');
        } else {
            $this->updated_at = new Expression('NOW()');
        }
    }
}
