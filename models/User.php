<?php

namespace app\models;

use \app\models\base\User as BaseUser;

/**
 * This is the model class for table "user".
 */
class User extends BaseUser
{
    public static function current()
    {
        return self::find()->where(['id' => \Yii::$app->user->id])->one() ?: new self;
    }

    public function hasWallet()
    {
        return !$this->isNewRecord && Wallet::find()->where(['user_id' => $this->id])->exists();
    }
}
