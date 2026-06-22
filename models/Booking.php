<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookings".
 */
class Booking extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'bookings';
    }



    public function rules()
    {
        return [

            [
                [
                    'package_id',
                    'booking_date',
                    'status'
                ],
                'required'
            ],


            [
                'package_id',
                'integer'
            ],


            [
                'booking_date',
                'safe'
            ],


            [
                'status',
                'string',
                'max' => 50
            ],


            [
                'package_id',
                'exist',
                'skipOnError' => true,
                'targetClass' => Package::class,
                'targetAttribute' => [
                    'package_id' => 'id'
                ]
            ],

        ];
    }




    public function attributeLabels()
    {
        return [

            'id' => 'ID',

            'package_id' => 'Package',

            'booking_date' => 'Booking Date',

            'status' => 'Status',

        ];
    }





    public function beforeSave($insert)
    {

        if(parent::beforeSave($insert))
        {

            if($insert)
            {
                $this->customer_id = Yii::$app->user->id;
            }


            if(empty($this->status))
            {
                $this->status = 'Pending';
            }


            return true;

        }


        return false;

    }






    public function getCustomer()
    {
        return $this->hasOne(User::class, [
            'id' => 'customer_id'
        ]);
    }





    public function getPackage()
    {
        return $this->hasOne(Package::class, [
            'id' => 'package_id'
        ]);
    }


}