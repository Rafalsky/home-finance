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
 * This is the base-model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $hash
 * @property string $name
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 *
 * @property WalletCategory[] $walletCategories
 */
abstract class Category extends HashedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'created_at'], 'required'],
            [['type'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
            'type' => \Yii::t('common', 'Type'),
            'created_at' => \Yii::t('common', 'Created At'),
            'updated_at' => \Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWalletCategories()
    {
        return $this->hasMany(WalletCategory::className(), ['category_id' => 'id']);
    }
}
