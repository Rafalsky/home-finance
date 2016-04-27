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

use app\models\Profile;
use app\models\SocialAccount;
use app\models\Token;

/**
 * This is the base-model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $confirmed_at
 * @property string $unconfirmed_email
 * @property integer $blocked_at
 * @property string $registration_ip
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $flags
 *
 * @property \common\models\Profile $profile
 * @property \common\models\SocialAccount[] $socialAccounts
 * @property \common\models\Token[] $tokens
 * @property string $aliasModel
 */
abstract class User extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
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
            return \Yii::t('app', 'Users');
        } else {
            return \Yii::t('app', 'User');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['confirmed_at', 'blocked_at', 'created_at', 'updated_at', 'flags'], 'integer'],
            [['username', 'email', 'unconfirmed_email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
            [['registration_ip'], 'string', 'max' => 45],
            [['email'], 'unique'],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'username' => \Yii::t('app', 'Username'),
            'email' => \Yii::t('app', 'Email'),
            'password_hash' => \Yii::t('app', 'Password Hash'),
            'auth_key' => \Yii::t('app', 'Auth Key'),
            'confirmed_at' => \Yii::t('app', 'Confirmed At'),
            'unconfirmed_email' => \Yii::t('app', 'Unconfirmed Email'),
            'blocked_at' => \Yii::t('app', 'Blocked At'),
            'registration_ip' => \Yii::t('app', 'Registration Ip'),
            'created_at' => \Yii::t('app', 'Created At'),
            'updated_at' => \Yii::t('app', 'Updated At'),
            'flags' => \Yii::t('app', 'Flags'),
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
                'username' => \Yii::t('app', 'Username'),
                'email' => \Yii::t('app', 'Email'),
                'password_hash' => \Yii::t('app', 'Password Hash'),
                'auth_key' => \Yii::t('app', 'Auth Key'),
                'confirmed_at' => \Yii::t('app', 'Confirmed At'),
                'unconfirmed_email' => \Yii::t('app', 'Unconfirmed Email'),
                'blocked_at' => \Yii::t('app', 'Blocked At'),
                'registration_ip' => \Yii::t('app', 'Registration Ip'),
                'created_at' => \Yii::t('app', 'Created At'),
                'updated_at' => \Yii::t('app', 'Updated At'),
                'flags' => \Yii::t('app', 'Flags'),
            ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialAccounts()
    {
        return $this->hasMany(SocialAccount::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens()
    {
        return $this->hasMany(Token::className(), ['user_id' => 'id']);
    }
}
