<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<style>

body{

background:
linear-gradient(
rgba(255,255,255,0.85),
rgba(230,240,255,0.85)
),
url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d')

center/cover fixed;

}



/* Main card */

.admin-form-card{

border-radius:25px;

animation:slideUp 0.8s ease;

}



@keyframes slideUp{

from{

opacity:0;

transform:translateY(40px);

}

to{

opacity:1;

transform:translateY(0);

}

}



/* Header */

.form-header{

background:

linear-gradient(
135deg,
#212529,
#198754
);

color:white;

border-radius:25px 25px 0 0;

}



/* Inputs */

.form-control{

border-radius:15px;

padding:12px;

transition:.3s;

}


.form-control:focus{

transform:scale(1.02);

box-shadow:

0 0 15px rgba(25,135,84,.4);

}



/* Buttons */

.btn{

border-radius:15px;

transition:.3s;

}



.btn:hover{

transform:translateY(-5px);

box-shadow:

0 10px 20px rgba(0,0,0,.2);

}



</style>





<div class="admin-form">



<div class="card shadow border-0 admin-form-card">



<div class="form-header p-4 text-center">


<h2 class="fw-bold">

🛡️ Create Administrator Account

</h2>


<p class="mb-0">

Add a new system administrator with secure access privileges.

</p>


</div>






<div class="card-body p-5">





<?php $form = ActiveForm::begin(); ?>






<?= $form->field($model,'username')

->textInput([

'maxlength'=>true,

'placeholder'=>'Enter username'

])

->label('👤 Administrator Username')

?>







<?= $form->field($model,'email')

->textInput([

'maxlength'=>true,

'placeholder'=>'Enter email address'

])

->label('📧 Email Address')

?>







<?= $form->field($model,'password')

->passwordInput([

'maxlength'=>true,

'placeholder'=>'Create strong password'

])

->label('🔐 Security Password')

?>








<div class="mt-4">


<?= Html::submitButton(

'🚀 Create Administrator',

[

'class'=>'btn btn-success btn-lg'

]

) ?>





<?= Html::a(

'⬅ Back to Administrators',

['index'],

[

'class'=>'btn btn-dark btn-lg ms-2'

]

) ?>


</div>






<?php ActiveForm::end(); ?>





</div>


</div>


</div>