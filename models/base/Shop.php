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

use app\models\Company;
use app\models\Product;
use \Yii\db\ActiveRecord;

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
 * @property \app\models\Product[] $products
 * @property \app\models\Receipt[] $receipts
 * @property \app\models\Company $company
 * @property string $aliasModel
 */
abstract class Shop extends ActiveRecord
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
            return \Yii::t('app', 'Shops');
        } else {
            return \Yii::t('app', 'Shop');
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
            'id' => \Yii::t('app', 'ID'),
            'company_id' => \Yii::t('app', 'Company ID'),
            'name' => \Yii::t('app', 'Name'),
            'address' => \Yii::t('app', 'Address'),
            'city' => \Yii::t('app', 'City'),
            'comment' => \Yii::t('app', 'Comment'),
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
                'company_id' => \Yii::t('app', 'Company Id'),
                'name' => \Yii::t('app', 'Name'),
                'address' => \Yii::t('app', 'Address'),
                'city' => \Yii::t('app', 'City'),
                'comment' => \Yii::t('app', 'Comment'),
                'created_at' => \Yii::t('app', 'Created At'),
                'updated_at' => \Yii::t('app', 'Updated At'),
            ]
        );
    }

    /**
     * @return \\Yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['shop_id' => 'id']);
    }

    /**
     * @return \\Yii\db\ActiveQuery
     */
    public function getReceipts()
    {
        return $this->hasMany(Receipt::className(), ['shop_id' => 'id']);
    }

    /**
     * @return \\Yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
