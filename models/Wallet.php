<?php

namespace app\models;

use \app\models\base\Wallet as BaseWallet;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "wallet".
 */
class Wallet extends BaseWallet
{
    const SCENARIO_CREATE = 'create';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['name', 'currency'], 'required', 'on' => self::SCENARIO_CREATE],
        ]);
    }

    public function beforeValidate()
    {
        $this->user_id = User::current()->id;
        if ($this->isNewRecord) {
            $this->created_at = new Expression('NOW()');
        } else {
            $this->updated_at = new Expression('NOW()');
        }
        return parent::beforeValidate();
    }
}
