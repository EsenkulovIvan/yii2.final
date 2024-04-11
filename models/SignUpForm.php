<?php

namespace app\models;

use yii\base\Model;

class SignUpForm extends Model
{
    public $fio;
    public $email;
    public $phone;
    public $password;
    public $repeatPassword;

    public function rules()
    {
        return [
            [['fio', 'email', 'phone', 'password', 'repeatPassword'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetAttribute' => 'email', 'targetClass' => 'app\models\User'],
            ['phone', 'string'],
//            ['phone', 'match', 'pattern' => '#^\+7\(\d{3}\)\d{5}$#'],
            ['repeatPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароль не совпадает'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fio' => 'ФИО',
            'email' => 'E-mail',
            'phone' => 'Номер телефона',
            'password' => 'Пароль',
            'repeatPassword' => 'Повторите пароль',
        ];
    }

    public function signUp()
    {
        if ($this->validate()) {
            $user = new User;
            $user->fio = $this->fio;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->password = $this->password;
            return $user->create();
        }
    }
}