<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$this->title = 'Safari Travel Management';


?>

<style>

body {

    background: linear-gradient(
        rgba(0,0,0,0.5),
        rgba(0,0,0,0.5)
    ),
    url('https://images.unsplash.com/photo-1516426122078-c23e76319801')
    center/cover fixed;

    animation: moveBackground 20s infinite alternate;

}


@keyframes moveBackground {

    from {

        background-position:center;

    }


    to {

        background-position:right center;

    }

}



.login-box {

    width:420px;

    background:rgba(255,255,255,0.95);

    border-radius:20px;

    padding:40px;

    box-shadow:0 15px 40px rgba(0,0,0,0.4);

}



.logo-title {

    color:#198754;

    font-weight:bold;

}



.login-btn {

    background:#198754;

    border:none;

}



.login-btn:hover {

    background:#146c43;

}


</style>





<div class="d-flex justify-content-center align-items-center min-vh-100">



<div class="login-box">



<div class="text-center mb-4">


<h1 class="logo-title">

🌍 Safari Travel Management

</h1>


<p class="text-muted">

Explore the world. Plan your journey. Create unforgettable memories.

</p>


</div>





<?php $form = ActiveForm::begin([
    'id'=>'login-form'
]); ?>



<?= $form->field($model,'username')->textInput([

    'placeholder'=>'Enter username'

])->label('Username') ?>




<?= $form->field($model,'password')->passwordInput([

    'placeholder'=>'Enter password'

])->label('Password') ?>





<?= $form->field($model,'rememberMe')->checkbox() ?>





<div class="d-grid">


<?= Html::submitButton(

    'Login',

    [

        'class'=>'btn btn-success btn-lg login-btn'

    ]

) ?>


</div>





<?php ActiveForm::end(); ?>





<p class="text-center mt-4 text-muted">

Your trusted partner in unforgettable adventures ✈️

</p>



</div>


</div>