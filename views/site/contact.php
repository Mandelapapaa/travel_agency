<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Contact Us';

?>

<div class="site-contact">

    <div class="text-center mb-5">

        <h1 class="display-5 fw-bold text-primary">
            📞 Contact Safari Travel Management
        </h1>

        <p class="lead">
            We'd love to hear from you. Contact us for bookings, inquiries, or travel assistance.
        </p>

    </div>


    <div class="row g-4">

        <!-- Contact Information -->
        <div class="col-md-4">

            <div class="card shadow border-0 h-100">

                <div class="card-header bg-dark text-white">

                    <h4 class="mb-0">
                        📍 Contact Information
                    </h4>

                </div>

                <div class="card-body">

                    <p>
                        <strong>🏢 Company</strong><br>
                        Safari Travel Management System
                    </p>

                    <hr>

                    <p>
                        <strong>📍 Location</strong><br>
                        Dar es Salaam, Tanzania
                    </p>

                    <hr>

                    <p>
                        <strong>📞 Phone</strong><br>
                        +255 757 021 602
                    </p>

                    <hr>

                    <p>
                        <strong>✉ Email</strong><br>
                        info@safaritravel.com
                    </p>

                    <hr>

                    <p>
                        <strong>🕒 Working Hours</strong><br>
                        Monday - Friday<br>
                        8:00 AM - 5:00 PM
                    </p>

                </div>

            </div>

        </div>



        <!-- Contact Form -->
        <div class="col-md-8">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        📨 Send Us a Message
                    </h4>

                </div>

                <div class="card-body p-4">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="row">

                        <div class="col-md-6">

                            <?= $form->field($model, 'name')
                                ->textInput([
                                    'placeholder' => 'Enter your full name'
                                ])
                            ?>

                        </div>

                        <div class="col-md-6">

                            <?= $form->field($model, 'email')
                                ->textInput([
                                    'placeholder' => 'Enter your email address'
                                ])
                            ?>

                        </div>

                    </div>

                    <?= $form->field($model, 'subject')
                        ->textInput([
                            'placeholder' => 'Message subject'
                        ])
                    ?>

                    <?= $form->field($model, 'body')
                        ->textarea([
                            'rows' => 6,
                            'placeholder' => 'Type your message here...'
                        ])
                    ?>

                    <div class="mt-3">

                        <?= Html::submitButton(
                            'Send Message',
                            [
                                'class' => 'btn btn-success btn-lg'
                            ]
                        ) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>

        </div>

    </div>


    <div class="card shadow border-0 mt-5">

        <div class="card-body text-center">

            <h3 class="text-success">
                🌍 Plan Your Next Adventure With Us
            </h3>

            <p class="lead mb-0">
                From wildlife safaris to beach holidays, we are ready to help you create unforgettable travel experiences.
            </p>

        </div>

    </div>

</div>