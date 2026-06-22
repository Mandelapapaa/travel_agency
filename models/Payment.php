<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "payments".
 */
class Payment extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'payments';
    }




    public function rules()
    {
        return [

            [
                [
                    'booking_id',
                    'payment_date',
                    'payment_method'
                ],
                'required'
            ],


            [
                'booking_id',
                'integer'
            ],


            [
                'amount',
                'number'
            ],


            [
                'payment_date',
                'safe'
            ],


            [
                'payment_method',
                'string',
                'max'=>50
            ],


            [
                'booking_id',
                'exist',
                'skipOnError'=>true,
                'targetClass'=>Booking::class,
                'targetAttribute'=>[
                    'booking_id'=>'id'
                ]
            ],

        ];
    }







    public function beforeSave($insert)
    {

        if(parent::beforeSave($insert))
        {


            // Automatically get package price
            if($this->booking_id)
            {

                $booking = Booking::findOne(
                    $this->booking_id
                );


                if($booking && $booking->package)
                {

                    $this->amount =
                        $booking->package->price;

                }

            }



            return true;

        }


        return false;

    }









    public function attributeLabels()
    {
        return [

            'id'=>'ID',

            'booking_id'=>'Booking',

            'amount'=>'Amount',

            'payment_date'=>'Payment Date',

            'payment_method'=>'Payment Method',

        ];
    }









    public function getBooking()
    {
        return $this->hasOne(
            Booking::class,
            [
                'id'=>'booking_id'
            ]
        );
    }

}