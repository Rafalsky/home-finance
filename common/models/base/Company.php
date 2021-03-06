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
 * This is the base-model class for table "{{%company}}".
 *
 * @property integer $id
 * @property string $hash
 * @property string $name
 * @property string $logo
 * @property string $about
 * @property integer $nationality
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Product[] $products
 * @property Shop[] $shops
 */
abstract class Company extends HashedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'created_at'], 'required'],
            [['nationality'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['hash'], 'string', 'max' => 23],
            [['name', 'logo', 'about'], 'string', 'max' => 255],
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
            'logo' => \Yii::t('common', 'Logo'),
            'about' => \Yii::t('common', 'About'),
            'nationality' => \Yii::t('common', 'Nationality'),
            'created_at' => \Yii::t('common', 'Created At'),
            'updated_at' => \Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shop::className(), ['company_id' => 'id']);
    }
}
