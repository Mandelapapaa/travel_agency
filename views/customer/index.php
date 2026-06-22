<?php

use app\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Customer Management';


$customers = $dataProvider->models;


?>



<style>


body{

background:

linear-gradient(
rgba(255,255,255,0.85),
rgba(230,245,230,0.85)
),

url('https://images.unsplash.com/photo-1516026672322-bc52d61a55d5')

center/cover fixed;


font-family:'Segoe UI',sans-serif;


}





.customer-header{


background:

linear-gradient(
135deg,
#1b5e20,
#d4af37
);


color:white;


border-radius:30px;


padding:35px;


box-shadow:

0 20px 40px rgba(0,0,0,.3);


animation:fadeDown 1s ease;


}



@keyframes fadeDown{


from{

opacity:0;

transform:translateY(-30px);

}


to{

opacity:1;

transform:translateY(0);

}


}






.customer-scroll{


display:flex;


gap:25px;


overflow-x:auto;


padding:20px;


scroll-behavior:smooth;


}




.customer-scroll::-webkit-scrollbar{


height:10px;


}



.customer-scroll::-webkit-scrollbar-thumb{


background:#d4af37;


border-radius:20px;


}





.customer-card{


min-width:300px;


background:white;


border-radius:25px;


padding:25px;


box-shadow:

0 15px 35px rgba(0,0,0,.2);


transition:.4s;


}



.customer-card:hover{


transform:translateY(-10px);


box-shadow:

0 25px 50px rgba(0,0,0,.35);


}




.customer-icon{


font-size:60px;


background:

linear-gradient(
135deg,
#1b5e20,
#d4af37
);


width:100px;


height:100px;


border-radius:50%;


display:flex;


align-items:center;


justify-content:center;


margin:auto;


color:white;


}




.customer-name{


color:#1b5e20;


font-weight:800;


font-size:22px;


}





.info-box{


background:#f8f9fa;


border-radius:15px;


padding:12px;


margin-top:10px;


}





.btn-create{


background:#1b5e20;


color:white;


border-radius:30px;


padding:12px 25px;


}



.btn-create:hover{


background:#d4af37;


color:white;


}





</style>






<div class="customer-page">






<div class="customer-header text-center mb-5">


<h1 class="fw-bold">

👥 Customer Management

</h1>


<p class="lead">

Manage safari travelers and customer information.

</p>


<h5>

Total Customers:

<?= count($customers) ?>

</h5>


<br>


<?= Html::a(

'➕ Create Customer',

['create'],

[

'class'=>'btn btn-create btn-lg'

]

) ?>



</div>









<div class="customer-scroll">





<?php foreach($customers as $model): ?>



<div class="customer-card">



<div class="customer-icon">

👤

</div>





<h3 class="customer-name text-center mt-3">

<?= Html::encode($model->full_name) ?>

</h3>





<div class="info-box">

📧

<strong>Email</strong>

<br>

<?= Html::encode($model->email) ?>

</div>





<div class="info-box">

📞

<strong>Phone</strong>

<br>

<?= Html::encode($model->phone) ?>

</div>
id="4y2p8s"
<div class="mt-4">


<div class="d-grid gap-2">



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

'confirm'=>'Are you sure you want to delete this customer?',

'method'=>'post'

]

]

) ?>



</div>



</div>


</div>



</div>



<?php endforeach; ?>



</div>







<?php if(count($customers)==0): ?>


<div class="alert alert-warning text-center mt-5">


👥 No customers available.


</div>



<?php endif; ?>





</div>