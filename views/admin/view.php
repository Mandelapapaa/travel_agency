<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/** @var yii\web\View $this */
/** @var app\models\Admin $model */


$this->title = 'Administrator Profile';

$this->params['breadcrumbs'][] = [
    'label'=>'Admins',
    'url'=>['index']
];

$this->params['breadcrumbs'][] = $this->title;


\yii\web\YiiAsset::register($this);

?>


<style>


body{

background:

linear-gradient(
rgba(255,255,255,.88),
rgba(230,240,255,.88)
),

url('https://images.unsplash.com/photo-1556761175-b413da4baf72')

center/cover fixed;

}



/* Profile card */

.admin-profile-card{

border-radius:25px;

overflow:hidden;

animation:fadeIn .8s ease;

}



@keyframes fadeIn{

from{

opacity:0;

transform:translateY(40px);

}


to{

opacity:1;

transform:translateY(0);

}

}





.profile-header{


background:

linear-gradient(
135deg,
#198754,
#0d6efd
);


color:white;

padding:40px;

text-align:center;

}




.profile-icon{

font-size:70px;

}





.info-card{

border-radius:20px;

padding:20px;

transition:.3s;

}



.info-card:hover{

transform:translateY(-5px);

box-shadow:

0 15px 30px rgba(0,0,0,.2);

}




.btn{

border-radius:15px;

transition:.3s;

}



.btn:hover{

transform:scale(1.05);

}


</style>








<div class="admin-view">






<div class="card shadow border-0 admin-profile-card">






<div class="profile-header">


<div class="profile-icon">

🛡️

</div>


<h1 class="fw-bold">

Administrator Profile

</h1>


<p class="lead">

System security and account information

</p>


</div>








<div class="card-body p-5">







<div class="d-flex justify-content-center gap-3 mb-4">



<?= Html::a(

'✏ Update Administrator',

['update','id'=>$model->id],

[

'class'=>'btn btn-warning btn-lg'

]

) ?>






<?= Html::a(

'🗑 Delete Administrator',

['delete','id'=>$model->id],

[

'class'=>'btn btn-danger btn-lg',

'data'=>[

'confirm'=>'Are you sure you want to delete this administrator?',

'method'=>'post'

]

]

) ?>





<?= Html::a(

'⬅ Back',

['index'],

[

'class'=>'btn btn-dark btn-lg'

]

) ?>




</div>









<div class="card shadow-sm border-0 info-card">





<?= DetailView::widget([


'model'=>$model,


'options'=>[

'class'=>'table table-striped'

],



'attributes'=>[


[

'attribute'=>'id',

'label'=>'🆔 Administrator ID'

],



[

'attribute'=>'username',

'label'=>'👤 Username'

],



[

'attribute'=>'email',

'label'=>'📧 Email Address',

'format'=>'email'

],



[

'attribute'=>'password',

'label'=>'🔐 Password'

],



],



]) ?>







</div>






</div>





</div>






</div>