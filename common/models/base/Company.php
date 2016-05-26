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
 * This is the base-model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property string $about
 * @property integer $nationality
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \common\models\Shop[] $shops
 * @property string $aliasModel
 */
abstract class Company extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company}}';
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
            return \Yii::t('common', 'Companies');
        } else {
            return \Yii::t('common', 'Company');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nationality'], 'integer'],
            [['created_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'logo', 'about'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('common', 'ID'),
            'name' => \Yii::t('common', 'Name'),
            'logo' => \Yii::t('common', 'Logo'),
            'about' => \Yii::t('common', 'About'),
            'nationality' => \Yii::t('common', 'Nationality'),
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
                'name' => \Yii::t('common', 'Name'),
                'logo' => \Yii::t('common', 'Logo'),
                'about' => \Yii::t('common', 'About'),
                'nationality' => \Yii::t('common', 'Nationality'),
                'created_at' => \Yii::t('common', 'Created At'),
                'updated_at' => \Yii::t('common', 'Updated At'),
            ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(\common\models\Shop::className(), ['company_id' => 'id']);
    }
}
