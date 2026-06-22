<?php

/** @var yii\web\View $this */
/** @var int $customers */
/** @var int $packages */
/** @var int $bookings */
/** @var float $payments */
/** @var app\models\Booking[] $recentBookings */

use yii\helpers\Html;

$this->title = 'Travel Agency Dashboard';
$this->params['meta_description'] = 'Travel agency management dashboard';

?>

<style>

.dashboard-bg {
    background: linear-gradient(135deg, #eef5ff, #f8f9fa);
    padding: 30px;
    border-radius: 25px;
}


.glass-card {

    background: rgba(255,255,255,0.65);
    backdrop-filter: blur(15px);
    border-radius: 25px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.3s ease;

}


.glass-card:hover {

    transform: translateY(-8px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.15);

}


.icon-box {

    width:70px;
    height:70px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    margin:auto;

}


.customer-icon {

    background:#dbeafe;
    color:#2563eb;

}


.package-icon {

    background:#dcfce7;
    color:#16a34a;

}


.booking-icon {

    background:#fef3c7;
    color:#d97706;

}


.payment-icon {

    background:#fee2e2;
    color:#dc2626;

}


.dashboard-title {

    letter-spacing:1px;

}

</style>



<div class="site-index dashboard-bg">


    <!-- Welcome Section -->

    <div class="p-5 mb-5 rounded-5 shadow text-white"
         style="background:linear-gradient(135deg,#0d6efd,#198754);">


        <h1 class="display-5 fw-bold dashboard-title">

            <i class="bi bi-globe2"></i>
            Safari Travel Management System

        </h1>


        <p class="lead">

            Manage customers, tour packages, bookings and payments from one place.

        </p>


        <p>

            Welcome to your professional travel administration dashboard.

        </p>


    </div>




    <!-- Dashboard Cards -->


    <div class="row g-4">



        <!-- Customers -->

        <div class="col-md-6 col-lg-3">

            <div class="glass-card text-center p-4 h-100">


                <div class="icon-box customer-icon">

                    <i class="bi bi-people-fill"></i>

                </div>



                <h2 class="text-primary fw-bold mt-3">

                    <?= $customers ?>

                </h2>


                <h5>

                    Customers

                </h5>


                <?= Html::a(
                    'Manage Customers',
                    ['/customer/index'],
                    [
                        'class'=>'btn btn-outline-primary mt-3 rounded-pill'
                    ]
                ) ?>


            </div>

        </div>




        <!-- Packages -->

        <div class="col-md-6 col-lg-3">


            <div class="glass-card text-center p-4 h-100">


                <div class="icon-box package-icon">

                    <i class="bi bi-map-fill"></i>

                </div>



                <h2 class="text-success fw-bold mt-3">

                    <?= $packages ?>

                </h2>


                <h5>

                    Tour Packages

                </h5>



                <?= Html::a(
                    'Manage Packages',
                    ['/package/index'],
                    [
                        'class'=>'btn btn-outline-success mt-3 rounded-pill'
                    ]
                ) ?>


            </div>


        </div>
                <!-- Bookings -->

        <div class="col-md-6 col-lg-3">


            <div class="glass-card text-center p-4 h-100">


                <div class="icon-box booking-icon">

                    <i class="bi bi-journal-check"></i>

                </div>



                <h2 class="text-warning fw-bold mt-3">

                    <?= $bookings ?>

                </h2>


                <h5>

                    Bookings

                </h5>



                <?= Html::a(
                    'Manage Bookings',
                    ['/booking/index'],
                    [
                        'class'=>'btn btn-outline-warning mt-3 rounded-pill'
                    ]
                ) ?>


            </div>


        </div>





        <!-- Payments -->

        <div class="col-md-6 col-lg-3">


            <div class="glass-card text-center p-4 h-100">


                <div class="icon-box payment-icon">

                    <i class="bi bi-cash-stack"></i>

                </div>



                <h2 class="text-danger fw-bold mt-3">

                    <?= number_format($payments, 2) ?>

                </h2>


                <h5>

                    Total Payments (TZS)

                </h5>



                <?= Html::a(
                    'Manage Payments',
                    ['/payment/index'],
                    [
                        'class'=>'btn btn-outline-danger mt-3 rounded-pill'
                    ]
                ) ?>


            </div>


        </div>


    </div>





    <!-- Recent Bookings -->


    <div class="glass-card mt-5 p-4">


        <h4 class="fw-bold mb-4">

            <i class="bi bi-calendar-check"></i>
            Recent Bookings

        </h4>



        <div class="table-responsive">


            <table class="table table-hover align-middle">


                <thead>

                    <tr>

                        <th>
                            Customer
                        </th>


                        <th>
                            Package
                        </th>


                        <th>
                            Booking Date
                        </th>


                        <th>
                            Status
                        </th>


                    </tr>

                </thead>



                <tbody>


                <?php if (!empty($recentBookings)): ?>


                    <?php foreach ($recentBookings as $booking): ?>


                        <tr>


                            <td>

                                <?= Html::encode(
                                    $booking->customer->full_name ?? 'Unknown'
                                ) ?>

                            </td>



                            <td>

                                <?= Html::encode(
                                    $booking->package->package_name ?? 'Unknown'
                                ) ?>

                            </td>



                            <td>

                                <?= Html::encode(
                                    $booking->booking_date
                                ) ?>

                            </td>




                            <td>


                                <?php if ($booking->status == 'Confirmed'): ?>


                                    <span class="badge bg-success rounded-pill px-3">

                                        <?= Html::encode($booking->status) ?>

                                    </span>



                                <?php elseif ($booking->status == 'Pending'): ?>


                                    <span class="badge bg-warning text-dark rounded-pill px-3">

                                        <?= Html::encode($booking->status) ?>

                                    </span>



                                <?php elseif ($booking->status == 'Cancelled'): ?>


                                    <span class="badge bg-danger rounded-pill px-3">

                                        <?= Html::encode($booking->status) ?>

                                    </span>



                                <?php else: ?>


                                    <span class="badge bg-secondary rounded-pill px-3">

                                        <?= Html::encode($booking->status) ?>

                                    </span>



                                <?php endif; ?>


                            </td>


                        </tr>



                    <?php endforeach; ?>



                <?php else: ?>


                    <tr>

                        <td colspan="4" class="text-center">

                            No bookings available.

                        </td>

                    </tr>



                <?php endif; ?>


                </tbody>


            </table>


        </div>


    </div>





    <!-- Footer Message -->


    <div class="text-center mt-5">


        <h2>

            ✈️ Explore. Book. Travel.

        </h2>


        <p class="text-muted">

            Your complete solution for managing safari tours and customer bookings.

        </p>


    </div>



</div>