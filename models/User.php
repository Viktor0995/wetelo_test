<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property integer $status
 * @property integer $role
 * @property string $password
 * @property string $password_salt
 * @property string $datetime_registration
 *
 * @property Comment[] $comments
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'role'], 'integer'],
            [['datetime_registration'], 'safe'],
            [['username', 'email', 'password', 'password_salt'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'status' => 'Status',
            'role' => 'Role',
            'password' => 'Password',
            'password_salt' => 'Password Salt',
            'datetime_registration' => 'Datetime Registration',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }
}
