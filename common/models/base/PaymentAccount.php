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
 * This is the base-model class for table "{{%payment_account}}".
 *
 * @property integer $id
 * @property string $hash
 * @property integer $wallet_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Wallet $wallet
 */
abstract class PaymentAccount extends HashedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%payment_account}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'created_at'], 'required'],
            [['wallet_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['hash'], 'string', 'max' => 23],
            [['name'], 'string', 'max' => 255],
            [['hash'], 'unique'],
            [['wallet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wallet::className(), 'targetAttribute' => ['wallet_id' => 'id']],
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
            'wallet_id' => \Yii::t('common', 'Wallet ID'),
            'name' => \Yii::t('common', 'Name'),
            'created_at' => \Yii::t('common', 'Created At'),
            'updated_at' => \Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWallet()
    {
        return $this->hasOne(Wallet::className(), ['id' => 'wallet_id']);
    }
}
