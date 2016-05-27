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
 * This is the base-model class for table "social_account".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $provider
 * @property string $client_id
 * @property string $data
 * @property string $code
 * @property integer $created_at
 * @property string $email
 * @property string $username
 *
 * @property \common\models\User $user
 * @property string $aliasModel
 */
abstract class SocialAccount extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%social_account}}';
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
            return \Yii::t('common', 'SocialAccounts');
        } else {
            return \Yii::t('common', 'SocialAccount');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'integer'],
            [['provider', 'client_id'], 'required'],
            [['data'], 'string'],
            [['provider', 'client_id', 'email', 'username'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 32],
            [
                ['provider', 'client_id'],
                'unique',
                'targetAttribute' => ['provider', 'client_id'],
                'message' => 'The combination of Provider and Client ID has already been taken.'
            ],
            [['code'], 'unique'],
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
            'id' => \Yii::t('common', 'ID'),
            'user_id' => \Yii::t('common', 'User ID'),
            'provider' => \Yii::t('common', 'Provider'),
            'client_id' => \Yii::t('common', 'Client ID'),
            'data' => \Yii::t('common', 'Data'),
            'code' => \Yii::t('common', 'Code'),
            'created_at' => \Yii::t('common', 'Created At'),
            'email' => \Yii::t('common', 'Email'),
            'username' => \Yii::t('common', 'Username'),
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
                'user_id' => \Yii::t('common', 'User Id'),
                'provider' => \Yii::t('common', 'Provider'),
                'client_id' => \Yii::t('common', 'Client Id'),
                'data' => \Yii::t('common', 'Data'),
                'code' => \Yii::t('common', 'Code'),
                'created_at' => \Yii::t('common', 'Created At'),
                'email' => \Yii::t('common', 'Email'),
                'username' => \Yii::t('common', 'Username'),
            ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
