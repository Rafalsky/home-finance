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

use \common\models\base\Wallet as BaseWallet;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "wallet".
 */
class Wallet extends BaseWallet
{
    const SCENARIO_CREATE = 'create';

    public static function current()
    {
        return self::find()->where(['user_id' => User::current()->id])->one();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['name', 'currency'], 'required', 'on' => self::SCENARIO_CREATE],
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'currency' => \Yii::t('common', 'Currency'),
        ]);
    }

    public function beforeValidate()
    {
        $this->user_id = User::current()->id;
        return parent::beforeValidate();
    }
}
