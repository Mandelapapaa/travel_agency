<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Booking;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Booking Management';


$bookings = $dataProvider->models;


?>


<style>


body{


background:

linear-gradient(
rgba(255,255,255,.85),
rgba(230,245,255,.85)
),

url('https://images.unsplash.com/photo-1516026672322-bc52d61a55d5')

center/cover fixed;


font-family:'Segoe UI',sans-serif;


}





.booking-header{


background:


linear-gradient(
135deg,
#198754,
#0d6efd
);


color:white;


border-radius:30px;


padding:40px;


box-shadow:

0 20px 40px rgba(0,0,0,.3);


animation:drop .8s ease;


}





@keyframes drop{


from{

opacity:0;

transform:translateY(-50px);

}


to{

opacity:1;

transform:translateY(0);

}


}






.booking-container{


display:flex;


gap:25px;


overflow-x:auto;


padding:20px;


}




.booking-container::-webkit-scrollbar{


height:10px;


}


.booking-container::-webkit-scrollbar-thumb{


background:#198754;


border-radius:20px;


}






.booking-card{


min-width:350px;


background:white;


border-radius:25px;


padding:25px;


box-shadow:

0 15px 35px rgba(0,0,0,.2);


transition:.4s;


}




.booking-card:hover{


transform:translateY(-12px);


box-shadow:

0 30px 60px rgba(0,0,0,.35);


}





.booking-icon{


width:90px;


height:90px;


border-radius:50%;


display:flex;


align-items:center;


justify-content:center;


margin:auto;


font-size:45px;


background:

linear-gradient(
135deg,
#198754,
#0d6efd
);


color:white;


}







.detail-box{


background:#f8f9fa;


padding:12px;


border-radius:15px;


margin-top:12px;


}







.price{


font-size:28px;


font-weight:800;


color:#198754;


}





.status{


padding:8px 18px;


border-radius:25px;


font-weight:bold;


display:inline-block;


}



.confirmed{


background:#d1e7dd;

color:#146c43;


}


.pending{


background:#fff3cd;

color:#856404;


}


.cancelled{


background:#f8d7da;

color:#842029;


}





</style>









<div class="booking-page">






<div class="booking-header text-center mb-5">


<h1 class="fw-bold">

📅 Booking Management

</h1>


<p class="lead">

Manage customer safari reservations and tour packages.

</p>



<?= Html::a(

'➕ Create Booking',

['create'],

[

'class'=>'btn btn-light btn-lg rounded-pill'

]

) ?>


</div>








<div class="booking-container">



<?php foreach($bookings as $model): ?>





<div class="booking-card">



<div class="booking-icon">

📅

</div>





<h3 class="text-center mt-3 fw-bold">

Booking #<?= $model->id ?>

</h3>





<div class="detail-box">


👤

<strong>Customer:</strong>


<br>


<?= Html::encode(

$model->customer->full_name ?? 'N/A'

) ?>


</div>






<div class="detail-box">


🌍

<strong>Package:</strong>


<br>


<?= Html::encode(

$model->package->package_name ?? 'N/A'

) ?>


</div>






<div class="price text-center mt-3">


TZS

<?= number_format(

$model->package->price ?? 0,

2

) ?>


</div>
<div class="detail-box">


📅

<strong>Date:</strong>


<br>


<?= date(

'd M Y',

strtotime($model->booking_date)

) ?>


</div>







<div class="detail-box text-center">


<?php


$status = strtolower($model->status);



if($status == 'confirmed'){


$class='confirmed';

$icon='✅';


}

elseif($status == 'pending'){


$class='pending';

$icon='⏳';


}

else{


$class='cancelled';

$icon='❌';


}



?>



<span class="status <?= $class ?>">


<?= $icon ?>

<?= Html::encode($model->status) ?>


</span>


</div>








<div class="mt-4 d-grid gap-2">





<?= Html::a(

'👁 View',

[

'view',

'id'=>$model->id

],

[

'class'=>'btn btn-primary'

]

) ?>








<div class="btn-group">





<?= Html::a(

'✏ Update',

[

'update',

'id'=>$model->id

],

[

'class'=>'btn btn-warning btn-sm'

]

) ?>







<?= Html::a(

'🗑 Delete',

[

'delete',

'id'=>$model->id

],

[

'class'=>'btn btn-danger btn-sm',

'data'=>[

'confirm'=>'Are you sure you want to delete this booking?',

'method'=>'post'

]

]

) ?>



</div>



</div>






</div>






<?php endforeach; ?>





</div>






<?php if(count($bookings)==0): ?>


<div class="alert alert-warning text-center mt-5">

📅 No bookings available.

</div>


<?php endif; ?>






</div>