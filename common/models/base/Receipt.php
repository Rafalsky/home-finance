<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models\base;

use common\models\ProductPrice;
use common\models\ReceiptProduct;
use common\models\Shop;

/**
 * This is the base-model class for table "receipt".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $user_id
 * @property integer $wallet_id
 * @property string $date
 * @property integer $is_live
 * @property string $comment
 * @property string $image_base_url
 * @property string $image_path
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \common\models\ProductPrice[] $productPrices
 * @property \common\models\Shop $shop
 * @property \common\models\ReceiptProduct[] $receiptProducts
 * @property string $aliasModel
 */
abstract class Receipt extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%receipt}}';
    }

    /**
     * Alias name of table for crud viewsLists all Area models.
     * Change the alias name manual if needed later
     * @param bool $plural
     * @return string
     */
    public function getAliasModel($plural = false)
    {
        if ($plural) {
            return \Yii::t('common', 'Receipts');
        } else {
            return \Yii::t('common', 'Receipt');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'user_id', 'wallet_id', 'date', 'created_at'], 'required'],
            [['shop_id', 'user_id', 'wallet_id', 'is_live'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['comment'], 'string'],
            [['image_base_url', 'image_path'], 'string', 'max' => 1024],
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
            'shop_id' => \Yii::t('common', 'Shop ID'),
            'user_id' => \Yii::t('common', 'User ID'),
            'wallet_id' => \Yii::t('common', 'Wallet ID'),
            'date' => \Yii::t('common', 'Date'),
            'is_live' => \Yii::t('common', 'Is Live'),
            'comment' => \Yii::t('common', 'Comment'),
            'image_base_url' => \Yii::t('common', 'Image Base Url'),
            'image_path' => \Yii::t('common', 'Image Path'),
            'created_at' => \Yii::t('common', 'Created At'),
            'updated_at' => \Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(),
            [
                'id' => \Yii::t('common', 'ID'),
                'shop_id' => \Yii::t('common', 'Shop Id'),
                'user_id' => \Yii::t('common', 'User Id'),
                'wallet_id' => \Yii::t('common', 'Wallet Id'),
                'date' => \Yii::t('common', 'Date'),
                'is_live' => \Yii::t('common', 'Is Live'),
                'comment' => \Yii::t('common', 'Comment'),
                'image_base_url' => \Yii::t('common', 'Image Base Url'),
                'image_path' => \Yii::t('common', 'Image Path'),
                'created_at' => \Yii::t('common', 'Created At'),
                'updated_at' => \Yii::t('common', 'Updated At'),
            ]
        );
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
