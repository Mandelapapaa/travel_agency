<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Safari Tour Packages';


$packages = $dataProvider->models;

?>


<style>


body{

background:

linear-gradient(
rgba(20,60,30,0.55),
rgba(0,0,0,0.45)
),

url('https://images.unsplash.com/photo-1516426122078-c23e76319801')

center/cover fixed;

font-family:'Segoe UI',sans-serif;

}




.package-container{

animation:fadeIn 1s ease;

}




@keyframes fadeIn{

from{

opacity:0;

transform:translateY(30px);

}


to{

opacity:1;

transform:translateY(0);

}

}





.package-header{


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

0 20px 40px rgba(0,0,0,.4);


}




.package-header h1{

font-weight:900;

}




/* Horizontal package area */


.package-scroll{


display:flex;


gap:25px;


overflow-x:auto;


padding:20px;


scroll-behavior:smooth;


}




.package-scroll::-webkit-scrollbar{

height:10px;

}



.package-scroll::-webkit-scrollbar-thumb{

background:#d4af37;

border-radius:20px;

}





/* Package cards */


.package-card{


min-width:300px;


max-width:300px;


background:white;


border-radius:25px;


overflow:hidden;


border:none;


transition:.4s;


box-shadow:

0 15px 35px rgba(0,0,0,.25);


}



.package-card:hover{


transform:translateY(-12px);


box-shadow:

0 25px 50px rgba(0,0,0,.45);


}




.package-image{


height:170px;


width:100%;


object-fit:cover;


}





.no-image{


height:170px;


display:flex;


align-items:center;


justify-content:center;


background:

linear-gradient(
135deg,
#1b5e20,
#d4af37
);


color:white;


font-size:35px;


}





.package-title{


font-weight:800;


color:#1b5e20;


}





.price-badge{


background:#1b5e20;


color:white;


border-radius:30px;


padding:10px 15px;


font-weight:bold;


display:inline-block;


}





.info{


font-size:14px;


}



.btn-book{


background:#1b5e20;


color:white;


border-radius:30px;


}


.btn-book:hover{


background:#d4af37;


color:white;


}




</style>






<div class="package-container">





<div class="package-header text-center mb-5">


<h1>

🌍 Safari Tour Packages

</h1>


<p class="lead">

Choose your next unforgettable adventure

</p>


<h5>

Available Packages:

<?= count($packages) ?>

</h5>


</div>








<div class="package-scroll">



<?php foreach($packages as $model): ?>



<div class="package-card">





<?php if($model->image): ?>


<?= Html::img(

Yii::getAlias('@web/uploads/'.$model->image),

[

'class'=>'package-image'

]

) ?>


<?php else: ?>


<div class="no-image">

🌍

</div>


<?php endif; ?>





<div class="p-3">


<h4 class="package-title">

<?= Html::encode($model->package_name) ?>

</h4>


<div class="info">

📍

<strong>

Destination:

</strong>

<br>

<?= Html::encode($model->destination) ?>


</div>


<br>


<div class="info">

⏳

<strong>

Duration:

</strong>

<br>

<?= Html::encode($model->duration) ?>


</div>


<br>


<div class="price-badge">

💰

<?= number_format($model->price,2) ?>

TZS

</div>


<br><br>


<p class="text-muted small">

<?= Html::encode(

StringHelper::truncate(

$model->description,

80

)

) ?>

</p>




<div class="d-grid gap-2">



<?= Html::a(

'🦁 Book This Package',

[

'/booking/create',

'package_id'=>$model->id

],

[

'class'=>'btn btn-book'

]

) ?>





<div class="btn-group">



<?= Html::a(

'👁',

[

'view',

'id'=>$model->id

],

[

'class'=>'btn btn-primary btn-sm',

'title'=>'View'

]

) ?>





<?= Html::a(

'✏',

[

'update',

'id'=>$model->id

],

[

'class'=>'btn btn-warning btn-sm',

'title'=>'Update'

]

) ?>





<?= Html::a(

'🗑',

[

'delete',

'id'=>$model->id

],

[

'class'=>'btn btn-danger btn-sm',

'title'=>'Delete',

'data'=>[

'confirm'=>'Delete this package?',

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







<?php if(count($packages)==0): ?>


<div class="alert alert-warning text-center mt-5">


🌍 No tour packages available.


</div>



<?php endif; ?>





</div>