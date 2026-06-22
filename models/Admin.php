<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $role
 */
class Admin extends ActiveRecord
{


    public static function tableName()
    {
        return 'admin';
    }






    public function rules()
    {
        return [


            [
                [
                    'username',
                    'email',
                    'password'
                ],

                'required'
            ],



            [
                'username',
                'string',
                'max'=>50
            ],




            [
                'email',
                'email'
            ],



            [
                'email',
                'string',
                'max'=>100
            ],




            [
                'password',
                'string',
                'min'=>6,
                'max'=>255
            ],




            [
                'role',
                'string',
                'max'=>20
            ],




            [
                'role',
                'in',
                'range'=>[
                    'admin',
                    'customer'
                ]
            ],




            [
                'username',
                'unique'
            ],




            [
                'email',
                'unique'
            ],



        ];
    }








    public function attributeLabels()
    {

        return [


            'id'=>'ID',


            'username'=>'Username',


            'email'=>'Email Address',


            'password'=>'Password',


            'role'=>'Account Type',


        ];

    }









    /**
     * Hash password before saving
     */
    public function beforeSave($insert)
    {


        if(parent::beforeSave($insert)){



            if($this->isAttributeChanged('password')){


                $this->password = Yii::$app->security
                    ->generatePasswordHash(
                        $this->password
                    );


            }





            // Default role for new accounts
            if(empty($this->role)){


                $this->role = 'customer';


            }




            return true;


        }



        return false;


    }







}