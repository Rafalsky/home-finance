<?php

/*
*  This file is part of the HomeFinanceV2 project.
*
*  (c) Rafalsky.com <http://github.com/Rafalsky/>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace common\models\base;

/**
 * This is the base-model class for table "{{%wallet}}".
 *
 * @property integer $id
 * @property string $hash
 * @property integer $user_id
 * @property string $name
 * @property string $currency
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PaymentAccount[] $paymentAccounts
 * @property User $user
 * @property WalletCategory[] $walletCategories
 */
abstract class Wallet extends HashedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wallet}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'user_id', 'name', 'created_at'], 'required'],
            [['user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['hash'], 'string', 'max' => 23],
            [['name'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 3],
            [['hash'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('common', 'ID'),
            'hash' => \Yii::t('common', 'Hash'),
            'user_id' => \Yii::t('common', 'User ID'),
            'name' => \Yii::t('common', 'Name'),
            'currency' => \Yii::t('common', 'Currency'),
            'created_at' => \Yii::t('common', 'Created At'),
            'updated_at' => \Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentAccounts()
    {
        return $this->hasMany(PaymentAccount::className(), ['wallet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWalletCategories()
    {
        return $this->hasMany(WalletCategory::className(), ['wallet_id' => 'id']);
    }
}
