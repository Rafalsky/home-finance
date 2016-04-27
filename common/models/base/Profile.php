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

use common\models\User;

/**
 * This is the base-model class for table "profile".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $public_email
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $location
 * @property string $website
 * @property string $bio
 *
 * @property \common\models\User $user
 * @property string $aliasModel
 */
abstract class Profile extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
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
            return \Yii::t('app', 'Profiles');
        } else {
            return \Yii::t('app', 'Profile');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['bio'], 'string'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
            [['gravatar_id'], 'string', 'max' => 32],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => ['user_id' => 'id']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => \Yii::t('app', 'User ID'),
            'name' => \Yii::t('app', 'Name'),
            'public_email' => \Yii::t('app', 'Public Email'),
            'gravatar_email' => \Yii::t('app', 'Gravatar Email'),
            'gravatar_id' => \Yii::t('app', 'Gravatar ID'),
            'location' => \Yii::t('app', 'Location'),
            'website' => \Yii::t('app', 'Website'),
            'bio' => \Yii::t('app', 'Bio'),
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
                'user_id' => \Yii::t('app', 'User Id'),
                'name' => \Yii::t('app', 'Name'),
                'public_email' => \Yii::t('app', 'Public Email'),
                'gravatar_email' => \Yii::t('app', 'Gravatar Email'),
                'gravatar_id' => \Yii::t('app', 'Gravatar Id'),
                'location' => \Yii::t('app', 'Location'),
                'website' => \Yii::t('app', 'Website'),
                'bio' => \Yii::t('app', 'Bio'),
            ]
        );
    }

    /**
     * @return \\Yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
