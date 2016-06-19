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
 * This is the base-model class for table "{{%receipt}}".
 *
 * @property integer $id
 * @property string $hash
 * @property integer $shop_id
 * @property integer $user_id
 * @property integer $wallet_id
 * @property string $date
 * @property integer $is_live
 * @property string $notes
 * @property string $image_base_url
 * @property string $image_path
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ProductPrice[] $productPrices
 * @property Shop $shop
 * @property ReceiptProduct[] $receiptProducts
 */
abstract class Receipt extends HashedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%receipt}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'shop_id', 'user_id', 'wallet_id', 'date', 'created_at'], 'required'],
            [['shop_id', 'user_id', 'wallet_id', 'is_live'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['notes'], 'string'],
            [['hash'], 'string', 'max' => 23],
            [['image_base_url', 'image_path'], 'string', 'max' => 1024],
            [['hash'], 'unique'],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
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
            'shop_id' => \Yii::t('common', 'Shop ID'),
            'user_id' => \Yii::t('common', 'User ID'),
            'wallet_id' => \Yii::t('common', 'Wallet ID'),
            'date' => \Yii::t('common', 'Date'),
            'is_live' => \Yii::t('common', 'Is Live'),
            'notes' => \Yii::t('common', 'Notes'),
            'image_base_url' => \Yii::t('common', 'Image Base Url'),
            'image_path' => \Yii::t('common', 'Image Path'),
            'created_at' => \Yii::t('common', 'Created At'),
            'updated_at' => \Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPrices()
    {
        return $this->hasMany(ProductPrice::className(), ['receipt_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'shop_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiptProducts()
    {
        return $this->hasMany(ReceiptProduct::className(), ['receipt_id' => 'id']);
    }
}
