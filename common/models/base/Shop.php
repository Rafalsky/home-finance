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
 * This is the base-model class for table "{{%shop}}".
 *
 * @property integer $id
 * @property string $hash
 * @property integer $company_id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Product[] $products
 * @property Receipt[] $receipts
 * @property Company $company
 */
abstract class Shop extends HashedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'name', 'created_at'], 'required'],
            [['company_id'], 'integer'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['hash'], 'string', 'max' => 23],
            [['name', 'address', 'city'], 'string', 'max' => 255],
            [['hash'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
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
