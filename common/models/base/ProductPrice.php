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

/**
 * This is the base-model class for table "product_price".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $receipt_id
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \common\models\Product $product
 * @property \common\models\Receipt $receipt
 * @property string $aliasModel
 */
abstract class ProductPrice extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_price}}';
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
            return \Yii::t('common', 'ProductPrices');
        } else {
            return \Yii::t('common', 'ProductPrice');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'created_at'], 'required'],
            [['product_id', 'receipt_id'], 'integer'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [
                ['product_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::className(),
                'targetAttribute' => ['product_id' => 'id']
            ],
            [
                ['receipt_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Receipt::className(),
                'targetAttribute' => ['receipt_id' => 'id']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('common', 'ID'),
            'product_id' => \Yii::t('common', 'Product ID'),
            'receipt_id' => \Yii::t('common', 'Receipt ID'),
            'price' => \Yii::t('common', 'Price'),
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
                'product_id' => \Yii::t('common', 'Product Id'),
                'receipt_id' => \Yii::t('common', 'Receipt Id'),
                'price' => \Yii::t('common', 'Price'),
                'created_at' => \Yii::t('common', 'Created At'),
                'updated_at' => \Yii::t('common', 'Updated At'),
            ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(\common\models\Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(\common\models\Receipt::className(), ['id' => 'receipt_id']);
    }
}
