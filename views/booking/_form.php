<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var app\models\Booking $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="booking-form">


<?php $form = ActiveForm::begin(); ?>



<?= $form->field($model, 'package_id')->dropDownList(

    ArrayHelper::map(

        \app\models\Package::find()->all(),

        'id',

        function($package){

            return $package->package_name .
                ' - TZS ' .
                number_format($package->price);

        }

    ),

    [

        'prompt'=>'Select Package'

    ]

) ?>




<?= $form->field($model, 'booking_date')->input('date') ?>



<div class="form-group">

<?= Html::submitButton(

    'Save Booking',

    [

        'class'=>'btn btn-success'

    ]

) ?>

</div>



<?php ActiveForm::end(); ?>


</div>