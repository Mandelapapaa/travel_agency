<?php

use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var app\models\Admin $model */


$this->title = 'Update Administrator';

$this->params['breadcrumbs'][] = [
    'label'=>'Admins',
    'url'=>['index']
];

$this->params['breadcrumbs'][] = [
    'label'=>$model->username,
    'url'=>['view','id'=>$model->id]
];

$this->params['breadcrumbs'][] = 'Update';

?>


<style>


body{

background:

linear-gradient(
rgba(255,255,255,.9),
rgba(230,245,255,.9)
),

url('https://images.unsplash.com/photo-1556761175-b413da4baf72')

center/cover fixed;

}



.update-header{

background:

linear-gradient(
135deg,
#ffc107,
#198754
);

color:white;

border-radius:25px;

padding:40px;

text-align:center;

animation:show .8s ease;

}




@keyframes show{

from{

opacity:0;

transform:translateY(-30px);

}


to{

opacity:1;

transform:translateY(0);

}

}



</style>





<div class="admin-update">





<div class="update-header shadow mb-5">



<h1 class="fw-bold">

✏️ Update Administrator

</h1>


<p class="lead mb-0">

Modify administrator account information securely.

</p>



</div>








<?= $this->render('_form', [

'model'=>$model,

]) ?>







</div>