<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;

use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Customer;
use app\models\Package;
use app\models\Booking;
use app\models\Payment;

use yii\captcha\CaptchaAction;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\base\Security;
use yii\mail\MailerInterface;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;


class SiteController extends Controller
{


    public function __construct(
        $id,
        $module,
        private readonly MailerInterface $mailer,
        private readonly Security $security,
        $config = []
    ) {

        parent::__construct($id, $module, $config);

    }







    public function behaviors(): array
    {

        return [

            'access'=>[

                'class'=>AccessControl::class,

                'rules'=>[


                    [

                        'actions'=>[
                            'login',
                            'about',
                            'contact',
                            'error'
                        ],

                        'allow'=>true,

                        'roles'=>['?','@'],

                    ],



                    [

                        'actions'=>[
                            'index',
                            'logout'
                        ],

                        'allow'=>true,

                        'roles'=>['@'],

                    ],


                ],

            ],




            'verbs'=>[

                'class'=>VerbFilter::class,

                'actions'=>[

                    'logout'=>['post'],

                ],

            ],


        ];

    }







    public function actions(): array
    {

        return [

            'error'=>[

                'class'=>ErrorAction::class,

            ],



            'captcha'=>[

                'class'=>CaptchaAction::class,

                'fixedVerifyCode'=>YII_ENV_TEST ? 'testme' : null,

                'transparent'=>true,

            ],


        ];

    }








    public function actionIndex(): string
    {


        $customers = Customer::find()->count();


        $packages = Package::find()->count();


        $bookings = Booking::find()->count();




        $payments = Payment::find()
            ->sum('amount') ?? 0;





        $confirmedBookings = Booking::find()
            ->where([
                'status'=>'Confirmed'
            ])
            ->count();





        $pendingBookings = Booking::find()
            ->where([
                'status'=>'Pending'
            ])
            ->count();






        $cancelledBookings = Booking::find()
            ->where([
                'in',
                'status',
                [
                    'Cancelled',
                    'Canceled'
                ]
            ])
            ->count();







        $recentBookings = Booking::find()

            ->orderBy([
                'id'=>SORT_DESC
            ])

            ->limit(5)

            ->all();







        // Latest package based on latest customer booking

        $latestBooking = Booking::find()

            ->orderBy([
                'id'=>SORT_DESC
            ])

            ->one();



        $latestPackage = null;



        if($latestBooking)
        {

            $latestPackage = $latestBooking->package;

        }







        return $this->render('index',[


            'customers'=>$customers,


            'packages'=>$packages,


            'bookings'=>$bookings,


            'payments'=>$payments,



            'confirmedBookings'=>$confirmedBookings,


            'pendingBookings'=>$pendingBookings,


            'cancelledBookings'=>$cancelledBookings,



            'recentBookings'=>$recentBookings,



            'latestPackage'=>$latestPackage,


        ]);

    }









    public function actionLogin(): Response|string
    {


        if(!Yii::$app->user->isGuest){

            return $this->goHome();

        }




        $model = new LoginForm($this->security);





        if(
            $model->load($this->request->post())
            &&
            $model->login()
        ){

            return $this->goBack();

        }






        $model->password = '';





        return $this->render('login',[

            'model'=>$model

        ]);

    }








    public function actionLogout(): Response
    {

        Yii::$app->user->logout();


        return $this->redirect([

            'site/login'

        ]);

    }








    public function actionAbout(): string
    {

        return $this->render('about');

    }








    public function actionContact(): Response|string
    {


        $model = new ContactForm();




        if(
            $model->load($this->request->post())
            &&
            $model->validate()
        ){


            Yii::$app->session->setFlash(

                'success',

                'Thank you for contacting Safari Travel Management. We will respond soon.'

            );



            return $this->refresh();


        }






        return $this->render('contact',[

            'model'=>$model

        ]);

    }



}