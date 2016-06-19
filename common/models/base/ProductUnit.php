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
 * This is the base-model class for table "{{%product_unit}}".
 *
 * @property integer $id
 * @property string $hash
 * @property string $name
 * @property integer $wallet_id
 * @property integer $is_live
 * @property string $created_at
 * @property string $updated_at
 * @property string $translations
 *
 * @property Product[] $products
 */
abstract class ProductUnit extends HashedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_unit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'created_at'], 'required'],
            [['wallet_id', 'is_live'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['translations'], 'string'],
            [['hash'], 'string', 'max' => 23],
            [['name'], 'string', 'max' => 255],
            [['hash'], 'unique'],
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
            'name' => \Yii::t('common', 'Name'),
            'wallet_id' => \Yii::t('common', 'Wallet ID'),
            'is_live' => \Yii::t('common', 'Is Live'),
            'created_at' => \Yii::t('common', 'Created At'),
            'updated_at' => \Yii::t('common', 'Updated At'),
            'translations' => \Yii::t('common', 'Translations'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_unit_id' => 'id']);
    }
}
