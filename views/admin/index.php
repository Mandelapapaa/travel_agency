<?php

use app\models\Admin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


$this->title = 'Admin Management';

$this->params['breadcrumbs'][] = $this->title;

?>

<style>


body{

background:

linear-gradient(
rgba(255,255,255,0.92),
rgba(230,245,255,0.92)
),

url('https://images.unsplash.com/photo-1556761175-b413da4baf72')

center/cover fixed;

}



/* Header */

.admin-header{

background:

linear-gradient(
135deg,
#212529,
#0d6efd
);

color:white;

border-radius:25px;

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



/* Card animation */


.admin-card{

border-radius:20px;

transition:.4s;

}



.admin-card:hover{

transform:translateY(-8px);

box-shadow:

0 15px 35px rgba(0,0,0,.25);

}



/* Table */


.table{

border-radius:15px;

overflow:hidden;

}



/* Buttons */


.btn{

transition:.3s;

}


.btn:hover{

transform:scale(1.05);

}



</style>






<div class="admin-index">







<div class="admin-header shadow p-5 mb-5 text-center">



<h1 class="fw-bold">

🛡️ Administrator Management

</h1>


<p class="lead">

Control system users, security and access privileges.

</p>


</div>








<div class="row g-4 mb-5">



<div class="col-md-6">


<div class="card admin-card shadow border-0 text-center p-4">


<h1>

👨‍💼

</h1>


<h2 class="fw-bold">

<?= $dataProvider->totalCount ?>

</h2>


<p class="text-muted">

Total Administrators

</p>


</div>


</div>





<div class="col-md-6">


<div class="card admin-card shadow border-0 text-center p-4">


<h1>

🔐

</h1>


<h2 class="fw-bold text-success">

Active

</h2>


<p class="text-muted">

System Access Status

</p>


</div>


</div>



</div>









<div class="d-flex justify-content-between align-items-center mb-4">



<h3 class="fw-bold">

System Administrators

</h3>




<?= Html::a(

'➕ Create Admin',

['create'],

[

'class'=>'btn btn-success btn-lg shadow'

]

) ?>



</div>









<div class="card admin-card shadow border-0">



<div class="card-header bg-dark text-white">


<h4 class="mb-0">

👥 Administrator Accounts

</h4>


</div>





<div class="card-body">







<?= GridView::widget([



'dataProvider'=>$dataProvider,


'filterModel'=>$searchModel,



'tableOptions'=>[

'class'=>'table table-hover table-striped align-middle'

],




'emptyText'=>'

<div class="text-center p-4">

No administrators found.

</div>

',





'columns'=>[





[

'class'=>'yii\grid\SerialColumn',

'header'=>'#'

],






[

'attribute'=>'username',

'label'=>'👤 Username',

'value'=>function($model){

return Html::encode(
$model->username
);

}

],







[

'attribute'=>'email',

'label'=>'📧 Email',

'format'=>'email'

],







[

'label'=>'🔐 Status',

'format'=>'raw',

'value'=>function($model){


return Html::tag(

'span',

'Active',

[

'class'=>'badge bg-success'

]

);


}

],







[

'class'=>ActionColumn::className(),

'header'=>'Actions',

'template'=>'{view} {update} {delete}',





'buttons'=>[



'view'=>function($url){


return Html::a(

'👁',

$url,

[

'class'=>'btn btn-primary btn-sm',

'title'=>'View'

]

);


},





'update'=>function($url){


return Html::a(

'✏',

$url,

[

'class'=>'btn btn-warning btn-sm',

'title'=>'Edit'

]

);


},





'delete'=>function($url){


return Html::a(

'🗑',

$url,

[

'class'=>'btn btn-danger btn-sm',

'title'=>'Delete',

'data'=>[

'confirm'=>'Delete this administrator?',

'method'=>'post'

]

]

);


},



],






'urlCreator'=>function($action, Admin $model){


return Url::to([

$action,

'id'=>$model->id

]);


}



],





],





]); ?>






</div>


</div>





</div>