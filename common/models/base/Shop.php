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

use common\models\Company;
use common\models\Product;

/**
 * This is the base-model class for table "shop".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \common\models\Product[] $products
 * @property \common\models\Receipt[] $receipts
 * @property \common\models\Company $company
 * @property string $aliasModel
 */
abstract class Shop extends TimestampedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop}}';
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
            return \Yii::t('common', 'Shops');
        } else {
            return \Yii::t('common', 'Shop');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id'], 'integer'],
            [['name', 'created_at'], 'required'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address', 'city'], 'string', 'max' => 255],
            [
                ['company_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Company::className(),
                'targetAttribute' => ['company_id' => 'id']
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
            'company_id' => \Yii::t('common', 'Company ID'),
            'name' => \Yii::t('common', 'Name'),
            'address' => \Yii::t('common', 'Address'),
            'city' => \Yii::t('common', 'City'),
            'comment' => \Yii::t('common', 'Comment'),
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
                'company_id' => \Yii::t('common', 'Company Id'),
                'name' => \Yii::t('common', 'Name'),
                'address' => \Yii::t('common', 'Address'),
                'city' => \Yii::t('common', 'City'),
                'comment' => \Yii::t('common', 'Comment'),
                'created_at' => \Yii::t('common', 'Created At'),
                'updated_at' => \Yii::t('common', 'Updated At'),
            ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['shop_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipts()
    {
        return $this->hasMany(Receipt::className(), ['shop_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
