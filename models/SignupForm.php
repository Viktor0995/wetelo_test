<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 23.09.2017
 * Time: 13:21
 */

namespace app\models;


use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['email'], 'email'],
            [['username'], 'string'],
            [['username'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'username'],
            [['email'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'email']
        ];

    }

    public function signup()
    {
        if($this->validate())
        {
            $user = new User();
            $user->attributes = $this->attributes;
            return $user->create();
        }

    }


}