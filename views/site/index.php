<?php

use yii\helpers\Html;

$this->title = 'Safari Travel Dashboard';

?>


<style>

/* Luxury Safari Background */

body {

    background:

    linear-gradient(
        rgba(20,60,30,0.55),
        rgba(0,0,0,0.45)
    ),

    url('https://images.unsplash.com/photo-1516026672322-bc52d61a55d5')

    center/cover fixed;

    font-family: 'Segoe UI', sans-serif;

}




/* Animated entrance */

@keyframes fadeUp {

    from {

        opacity:0;

        transform:translateY(40px);

    }


    to {

        opacity:1;

        transform:translateY(0);

    }

}




@keyframes floating {

    0%{

        transform:translateY(0px);

    }


    50%{

        transform:translateY(-8px);

    }


    100%{

        transform:translateY(0px);

    }

}




.dashboard-container{

    animation:fadeUp 1s ease;

}




/* Header */


.safari-header {


    background:

    linear-gradient(
        135deg,
        rgba(46,125,50,.95),
        rgba(212,175,55,.95)
    );


    color:white;

    border-radius:30px;

    padding:45px;

    box-shadow:

    0 20px 40px rgba(0,0,0,.35);

}




.safari-header h1{

    font-weight:800;

    letter-spacing:1px;

}




/* Cards */


.safari-card {


    background:

    rgba(255,255,255,0.92);


    backdrop-filter:blur(10px);


    border-radius:25px;


    border:none;


    transition:.5s;


    animation:floating 5s infinite;


}




.safari-card:hover{


    transform:

    translateY(-12px)

    scale(1.03);


    box-shadow:

    0 25px 50px rgba(0,0,0,.4);


}




.icon-box{


    font-size:55px;

}




.number{


    font-size:35px;

    font-weight:900;

    color:#2e7d32;

}




/* Section cards */


.section-card{


    border-radius:25px;

    overflow:hidden;

    box-shadow:

    0 20px 40px rgba(0,0,0,.3);


}



.section-title{


    background:

    linear-gradient(
        90deg,
        #1b5e20,
        #d4af37
    );


    color:white;

    padding:18px;


}



/* Buttons */


.btn-safari{


    background:#2e7d32;

    color:white;

    border-radius:30px;

    transition:.3s;


}



.btn-safari:hover{


    background:#d4af37;

    color:white;

    transform:scale(1.05);


}



.badge{

    padding:10px 15px;

    border-radius:20px;

}



</style>





<div class="dashboard-container">





<div class="safari-header mb-5 text-center shadow">


<h1>

🌍 Safari Travel Management System

</h1>


<h3 class="mt-3">

Welcome back,

<?= Html::encode(

Yii::$app->user->identity->username ?? 'Administrator'

) ?>

</h3>


<p class="mt-3">

Explore, organize and manage unforgettable journeys.

</p>



</div>








<div class="row g-4">



<?php

$cards=[


['👥',$customers,'Customers'],


['🌍',$packages,'Tour Packages'],


['📅',$bookings,'Total Bookings'],


['💰',number_format($payments,2).' TZS','Payments']


];



foreach($cards as $card):

?>



<div class="col-md-3">



<div class="card safari-card text-center p-4">



<div class="icon-box">

<?= $card[0] ?>

</div>



<div class="number mt-3">

<?= $card[1] ?>

</div>



<h5 class="mt-2">

<?= $card[2] ?>

</h5>



</div>



</div>



<?php endforeach; ?>



</div>






<div class="row g-4 mt-4">



<?php

$statusCards=[


['✅',$confirmedBookings,'Confirmed','success'],


['⏳',$pendingBookings,'Pending','warning'],


['❌',$cancelledBookings,'Cancelled','danger']


];



foreach($statusCards as $status):

?>



<div class="col-md-4">



<div class="card safari-card text-center p-4">


<h1>

<?= $status[0] ?>

</h1>



<h2 class="text-<?= $status[3] ?> fw-bold">

<?= $status[1] ?>

</h2>



<h5>

<?= $status[2] ?> Bookings

</h5>



</div>


</div>



<?php endforeach; ?>


</div>
<!-- Latest Package -->

<div class="card section-card mt-5">


<div class="section-title">

<h4>

🌍 Latest Tour Package

</h4>

</div>



<div class="card-body bg-white p-4">



<?php if($latestPackage): ?>


<h2 class="fw-bold text-success">

<?= Html::encode($latestPackage->package_name) ?>

</h2>



<div class="row mt-4">


<div class="col-md-4">

<strong>

📍 Destination

</strong>


<p>

<?= Html::encode($latestPackage->destination) ?>

</p>


</div>



<div class="col-md-4">

<strong>

⏳ Duration

</strong>


<p>

<?= Html::encode($latestPackage->duration) ?>

</p>


</div>




<div class="col-md-4">

<strong>

💰 Price

</strong>


<p>

<?= number_format($latestPackage->price,2) ?> TZS

</p>


</div>



</div>



<?php else: ?>


<p>

No package available.

</p>


<?php endif; ?>



</div>


</div>









<!-- Quick Actions -->


<div class="card section-card mt-5">


<div class="section-title">

<h4>

⚡ Quick Actions

</h4>


</div>



<div class="card-body bg-white p-4">


<div class="row g-3">


<div class="col-md-3">


<?= Html::a(

'➕ Add Customer',

['/customer/create'],

[

'class'=>'btn btn-primary w-100 btn-lg rounded-pill'

]

) ?>


</div>





<div class="col-md-3">


<?= Html::a(

'🌍 Add Package',

['/package/create'],

[

'class'=>'btn btn-success w-100 btn-lg rounded-pill'

]

) ?>


</div>





<div class="col-md-3">


<?= Html::a(

'📅 Create Booking',

['/booking/create'],

[

'class'=>'btn btn-warning w-100 btn-lg rounded-pill'

]

) ?>


</div>





<div class="col-md-3">


<?= Html::a(

'💳 Payments',

['/payment/index'],

[

'class'=>'btn btn-info w-100 btn-lg rounded-pill'

]

) ?>


</div>



</div>


</div>


</div>









<!-- Recent Bookings -->


<div class="card section-card mt-5 mb-5">


<div class="section-title">


<h4>

📅 Recent Bookings

</h4>


</div>





<div class="card-body bg-white">



<?php if(count($recentBookings)>0): ?>



<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-success">


<tr>

<th>ID</th>

<th>Customer</th>

<th>Package</th>

<th>Date</th>

<th>Status</th>


</tr>


</thead>




<tbody>



<?php foreach($recentBookings as $booking): ?>



<tr>


<td>

<?= Html::encode($booking->id) ?>

</td>



<td>

<?= Html::encode(

$booking->customer->name ?? 'N/A'

) ?>

</td>




<td>


<?= Html::encode(

$booking->package->package_name ?? 'N/A'

) ?>


</td>





<td>

<?= Html::encode(

$booking->booking_date

) ?>


</td>





<td>


<?php


$status=strtolower($booking->status);



if($status=='confirmed'){

$badge='success';

}

elseif($status=='pending'){

$badge='warning';

}

elseif($status=='cancelled' || $status=='canceled'){

$badge='danger';

}

else{

$badge='secondary';

}


?>



<span class="badge bg-<?= $badge ?>">


<?= Html::encode($booking->status) ?>


</span>



</td>



</tr>



<?php endforeach; ?>



</tbody>



</table>



</div>



<?php else: ?>


<div class="text-center p-4">

No bookings available.

</div>


<?php endif; ?>



</div>



</div>





</div>