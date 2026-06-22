<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Booking;


/** @var yii\web\View $this */
/** @var app\models\Payment $model */
/** @var yii\widgets\ActiveForm $form */

?>


<div class="payment-form">


<?php $form = ActiveForm::begin(); ?>



<?= $form->field($model, 'booking_id')->dropDownList(

    ArrayHelper::map(

        Booking::find()->all(),

        'id',

        function($booking){

            return 'Booking #'.$booking->id .
            ' - ' .
            ($booking->package->package_name ?? 'No Package')
            .
            ' - TZS ' .
            number_format(
                $booking->package->price ?? 0
            );

        }

    ),

    [

        'prompt'=>'Select Booking'

    ]

) ?>




<?= $form->field($model, 'amount')->textInput([

    'readonly'=>true

]) ?>




<?= $form->field($model, 'payment_date')->input('date') ?>




<?= $form->field($model, 'payment_method')->dropDownList(

    [

        'Cash'=>'Cash',

        'Bank Transfer'=>'Bank Transfer',

        'Mobile Money'=>'Mobile Money',

    ],

    [

        'prompt'=>'Select Payment Method'

    ]

) ?>




<div class="form-group">

<?= Html::submitButton(

    'Save',

    [

        'class'=>'btn btn-success'

    ]

) ?>

</div>




<?php ActiveForm::end(); ?>


</div>