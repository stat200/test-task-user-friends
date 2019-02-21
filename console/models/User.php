<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 *
 * @property UsersFriends[] $usersFriends
 * @property UsersFriends[] $usersFriends0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'password'], 'string', 'max' => 191],
            [['remember_token'], 'string', 'max' => 100],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'remember_token' => 'Remember Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersFriends()
    {
        return $this->hasMany(UsersFriends::className(), ['friend_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersFriends0()
    {
        return $this->hasMany(UsersFriends::className(), ['user_id' => 'id']);
    }
}
