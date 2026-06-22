<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookings".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $package_id
 * @property string $booking_date
 * @property string $status
 *
 * @property Users $customer
 * @property Packages $package
 */
class Booking extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'package_id', 'booking_date', 'status'], 'required'],
            [['customer_id', 'package_id'], 'integer'],
            [['booking_date'], 'safe'],
            [['status'], 'string', 'max' => 50],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => Packages::class, 'targetAttribute' => ['package_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'package_id' => 'Package ID',
            'booking_date' => 'Booking Date',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Users::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[Package]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Packages::class, ['id' => 'package_id']);
    }

}
