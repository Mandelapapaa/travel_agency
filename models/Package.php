<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "packages".
 *
 * @property int $id
 * @property string $package_name
 * @property string $destination
 * @property string $duration
 * @property float $price
 * @property string|null $description
 * @property string|null $image
 *
 * @property Booking[] $bookings
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_name', 'destination', 'duration', 'price'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['image'], 'string', 'max' => 255],
            [['package_name', 'destination'], 'string', 'max' => 100],
            [['duration'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_name' => 'Package Name',
            'destination' => 'Destination',
            'duration' => 'Duration',
            'price' => 'Price',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::class, ['package_id' => 'id']);
    }
}