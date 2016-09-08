<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $email
 */
class Admins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email'], 'required'],
            [['login'], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 45],
            [['login'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }
}
