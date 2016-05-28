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
 * This is the base-model class for table "product".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \common\models\Shop $shop
 * @property \common\models\ProductPrice[] $productPrices
 * @property \common\models\ReceiptProduct[] $receiptProducts
 * @property string $aliasModel
 */
abstract class Product extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
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
            return \Yii::t('common', 'Products');
        } else {
            return \Yii::t('common', 'Product');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id'], 'integer'],
            [['created_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [
                ['shop_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => \common\models\Shop::className(),
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
            'id' => \Yii::t('common', 'ID'),
            'shop_id' => \Yii::t('common', 'Shop ID'),
            'name' => \Yii::t('common', 'Name'),
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
                'name' => \Yii::t('common', 'Name'),
                'created_at' => \Yii::t('common', 'Created At'),
                'updated_at' => \Yii::t('common', 'Updated At'),
            ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(\common\models\Shop::className(), ['id' => 'shop_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPrices()
    {
        return $this->hasMany(\common\models\ProductPrice::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiptProducts()
    {
        return $this->hasMany(\common\models\ReceiptProduct::className(), ['product_id' => 'id']);
    }
}
