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
 * This is the base-model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $hash
 * @property integer $shop_id
 * @property integer $company_id
 * @property integer $category_id
 * @property integer $product_unit_id
 * @property string $name
 * @property string $image_base_url
 * @property string $image_path
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $details
 *
 * @property Company $company
 * @property Shop $shop
 * @property ProductUnit $productUnit
 * @property ProductPrice[] $productPrices
 * @property ReceiptProduct[] $receiptProducts
 */
abstract class Product extends HashedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'created_at'], 'required'],
            [['shop_id', 'company_id', 'category_id', 'product_unit_id'], 'integer'],
            [['description', 'details'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['hash'], 'string', 'max' => 23],
            [['name'], 'string', 'max' => 255],
            [['image_base_url', 'image_path'], 'string', 'max' => 1024],
            [['hash'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['product_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductUnit::className(), 'targetAttribute' => ['product_unit_id' => 'id']],
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
            'company_id' => \Yii::t('common', 'Company ID'),
            'category_id' => \Yii::t('common', 'Category ID'),
            'product_unit_id' => \Yii::t('common', 'Product Unit ID'),
            'name' => \Yii::t('common', 'Name'),
            'image_base_url' => \Yii::t('common', 'Image Base Url'),
            'image_path' => \Yii::t('common', 'Image Path'),
            'description' => \Yii::t('common', 'Description'),
            'created_at' => \Yii::t('common', 'Created At'),
            'updated_at' => \Yii::t('common', 'Updated At'),
            'details' => \Yii::t('common', 'Details'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
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
    public function getProductUnit()
    {
        return $this->hasOne(ProductUnit::className(), ['id' => 'product_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPrices()
    {
        return $this->hasMany(ProductPrice::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiptProducts()
    {
        return $this->hasMany(ReceiptProduct::className(), ['product_id' => 'id']);
    }
}
