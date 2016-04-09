<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models\base;

use app\models\ProductPrice;
use app\models\ReceiptProduct;
use app\models\Shop;
use yii\db\ActiveRecord;

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
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\ProductPrice[] $productPrices
 * @property \app\models\Shop $shop
 * @property \app\models\ReceiptProduct[] $receiptProducts
 * @property string $aliasModel
 */
abstract class Receipt extends ActiveRecord
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
            return \Yii::t('app', 'Receipts');
        } else {
            return \Yii::t('app', 'Receipt');
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
            [['image'], 'string', 'max' => 255],
            [
                ['shop_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Shop::className(),
                'targetAttribute' => ['shop_id' => 'id']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'shop_id' => \Yii::t('app', 'Shop ID'),
            'user_id' => \Yii::t('app', 'User ID'),
            'wallet_id' => \Yii::t('app', 'Wallet ID'),
            'date' => \Yii::t('app', 'Date'),
            'is_live' => \Yii::t('app', 'Is Live'),
            'comment' => \Yii::t('app', 'Comment'),
            'image' => \Yii::t('app', 'Image'),
            'created_at' => \Yii::t('app', 'Created At'),
            'updated_at' => \Yii::t('app', 'Updated At'),
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
                'id' => \Yii::t('app', 'ID'),
                'shop_id' => \Yii::t('app', 'Shop Id'),
                'user_id' => \Yii::t('app', 'User Id'),
                'wallet_id' => \Yii::t('app', 'Wallet Id'),
                'date' => \Yii::t('app', 'Date'),
                'is_live' => \Yii::t('app', 'Is Live'),
                'comment' => \Yii::t('app', 'Comment'),
                'image' => \Yii::t('app', 'Image'),
                'created_at' => \Yii::t('app', 'Created At'),
                'updated_at' => \Yii::t('app', 'Updated At'),
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
