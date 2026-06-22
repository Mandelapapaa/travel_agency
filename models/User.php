<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'admin';
    }


    public static function findIdentity($id)
    {
        return self::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }


    public static function findByUsername($username)
    {
        return self::find()
            ->where(['username' => $username])
            ->one();
    }


    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return null;
    }


    public function validateAuthKey($authKey)
    {
        return true;
    }


    public function validatePassword($password)
    {
        return password_verify(
            $password,
            $this->password
        );
    }

}