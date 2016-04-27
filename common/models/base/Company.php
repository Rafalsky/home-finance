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
            return \Yii::t('app', 'Companies');
        } else {
            return \Yii::t('app', 'Company');
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
            'id' => \Yii::t('app', 'ID'),
            'name' => \Yii::t('app', 'Name'),
            'logo' => \Yii::t('app', 'Logo'),
            'about' => \Yii::t('app', 'About'),
            'nationality' => \Yii::t('app', 'Nationality'),
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
                'name' => \Yii::t('app', 'Name'),
                'logo' => \Yii::t('app', 'Logo'),
                'about' => \Yii::t('app', 'About'),
                'nationality' => \Yii::t('app', 'Nationality'),
                'created_at' => \Yii::t('app', 'Created At'),
                'updated_at' => \Yii::t('app', 'Updated At'),
            ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(\app\models\Shop::className(), ['company_id' => 'id']);
    }
}
