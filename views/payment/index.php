<?php

use app\models\Payment;
use yii\helpers\Html;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Payment Management';


$payments = $dataProvider->models;


?>


<style>


body{


background:


linear-gradient(
rgba(255,255,255,.85),
rgba(230,245,255,.85)
),


url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee')

center/cover fixed;


font-family:'Segoe UI',sans-serif;


}





.payment-header{


background:


linear-gradient(
135deg,
#0d6efd,
#198754
);


color:white;


border-radius:30px;


padding:35px;


box-shadow:

0 20px 40px rgba(0,0,0,.3);


animation:slideDown 1s ease;


}





@keyframes slideDown{


from{

opacity:0;

transform:translateY(-40px);

}


to{

opacity:1;

transform:translateY(0);

}


}







.payment-scroll{


display:flex;


gap:25px;


overflow-x:auto;


padding:20px;


}




.payment-scroll::-webkit-scrollbar{


height:10px;


}



.payment-scroll::-webkit-scrollbar-thumb{


background:#198754;


border-radius:20px;


}







.payment-card{


min-width:330px;


background:white;


border-radius:25px;


padding:25px;


box-shadow:

0 15px 35px rgba(0,0,0,.2);


transition:.4s;


}



.payment-card:hover{


transform:translateY(-10px);


box-shadow:

0 25px 50px rgba(0,0,0,.35);


}





.payment-icon{


width:90px;


height:90px;


border-radius:50%;


background:

linear-gradient(
135deg,
#0d6efd,
#198754
);


display:flex;


align-items:center;


justify-content:center;


margin:auto;


font-size:45px;


color:white;


}





.amount{


font-size:28px;


font-weight:800;


color:#198754;


}





.info{


background:#f8f9fa;


padding:12px;


border-radius:15px;


margin-top:12px;


}





.method{


display:inline-block;


padding:8px 15px;


border-radius:20px;


font-weight:bold;


}



.cash{

background:#d1e7dd;

color:#146c43;

}


.mobile{

background:#fff3cd;

color:#856404;

}


.bank{

background:#cfe2ff;

color:#084298;

}



</style>







<div class="payment-page">






<div class="payment-header text-center mb-5">



<h1 class="fw-bold">

💳 Payment Management

</h1>



<p class="lead">

Track safari payments and customer transactions easily.

</p>



<h5>

Total Payments:

<?= count($payments) ?>

</h5>




<br>



<?= Html::a(

'➕ Create Payment',

['create'],

[

'class'=>'btn btn-light btn-lg rounded-pill'

]

) ?>



</div>









<div class="payment-scroll">





<?php foreach($payments as $model): ?>



<div class="payment-card">



<div class="payment-icon">

💳

</div>




<h3 class="text-center mt-3 fw-bold">

Payment #<?= $model->id ?>

</h3>





<div class="info">


👤

<strong>Customer:</strong>


<br>


<?= Html::encode(

$model->booking->customer->full_name ?? 'N/A'

) ?>


</div>





<div class="info">


🌍

<strong>Package:</strong>


<br>


<?= Html::encode(

$model->booking->package->package_name ?? 'N/A'

) ?>


</div>





<div class="amount text-center mt-3">


<?= number_format($model->amount,2) ?>

TZS


</div>
<div class="info">


📅

<strong>Payment Date:</strong>


<br>


<?= date(

'd M Y',

strtotime($model->payment_date)

) ?>


</div>







<div class="info">


💳

<strong>Method:</strong>


<br>



<?php


$method = strtolower($model->payment_method);



if($method == 'cash'){

    $class='cash';

    $icon='💵';

}

elseif($method == 'mobile money'){

    $class='mobile';

    $icon='📱';

}

elseif($method == 'bank transfer'){

    $class='bank';

    $icon='🏦';

}

else{

    $class='bank';

    $icon='💳';

}


?>



<span class="method <?= $class ?>">


<?= $icon ?>

<?= Html::encode($model->payment_method) ?>


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

'confirm'=>'Are you sure you want to delete this payment?',

'method'=>'post'

]

]

) ?>



</div>



</div>





</div>





<?php endforeach; ?>





</div>







<?php if(count($payments)==0): ?>


<div class="alert alert-warning text-center mt-5">

💳 No payment records available.

</div>


<?php endif; ?>






</div>