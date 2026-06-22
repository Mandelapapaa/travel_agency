<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Booking $model */

$this->title = 'Create New Booking';

$this->params['breadcrumbs'][] = [
    'label' => 'Bookings',
    'url' => ['index']
];

$this->params['breadcrumbs'][] = $this->title;

?>


<div class="booking-create">



    <div class="card shadow border-0">



        <div class="card-header bg-success text-white">


            <h2 class="mb-0">

                📅 Create Safari Booking

            </h2>


        </div>





        <div class="card-body p-4">



            <p class="text-muted">

                Complete the form below to create a new tour booking.

            </p>




            <?= $this->render('_form', [

                'model' => $model,

            ]) ?>



        </div>



    </div>



</div>