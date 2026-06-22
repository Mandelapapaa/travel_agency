<?php

namespace app\controllers;

use app\models\Booking;
use app\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class BookingController extends Controller
{


    public function behaviors()
    {

        return array_merge(
            parent::behaviors(),
            [

                'access' => [

                    'class' => AccessControl::class,

                    'rules' => [


                        // CUSTOMER CAN CREATE BOOKING WITHOUT LOGIN
                        [

                            'actions' => [
                                'create'
                            ],

                            'allow' => true,

                            'roles' => ['?','@'],

                        ],



                        // ADMIN ONLY ACTIONS
                        [

                            'actions' => [

                                'index',
                                'view',
                                'update',
                                'delete'

                            ],

                            'allow' => true,

                            'roles' => ['@'],

                        ],


                    ],

                ],



                'verbs' => [

                    'class' => VerbFilter::class,

                    'actions' => [

                        'delete' => ['POST'],

                    ],

                ],


            ]
        );

    }






    public function actionIndex()
    {

        $searchModel = new BookingSearch();


        $dataProvider = $searchModel->search(
            $this->request->queryParams
        );


        return $this->render('index',[

            'searchModel'=>$searchModel,

            'dataProvider'=>$dataProvider,

        ]);

    }








    public function actionView($id)
    {

        return $this->render('view',[

            'model'=>$this->findModel($id),

        ]);

    }








    public function actionCreate()
    {

        $model = new Booking();



        if($this->request->isPost)
        {


            if(
                $model->load($this->request->post())
                &&
                $model->save()
            )
            {


                return $this->redirect([
                    'create'
                ]);


            }


        }
        else
        {

            $model->loadDefaultValues();

        }



        return $this->render('create',[

            'model'=>$model,

        ]);


    }









    public function actionUpdate($id)
    {


        $model=$this->findModel($id);



        if(
            $this->request->isPost
            &&
            $model->load($this->request->post())
            &&
            $model->save()
        )
        {


            return $this->redirect([

                'view',

                'id'=>$model->id

            ]);


        }



        return $this->render('update',[

            'model'=>$model,

        ]);

    }









    public function actionDelete($id)
    {


        $this->findModel($id)->delete();


        return $this->redirect(['index']);

    }









    protected function findModel($id)
    {


        if(
            ($model = Booking::findOne($id)) !== null
        )
        {

            return $model;

        }



        throw new NotFoundHttpException(
            'The requested page does not exist.'
        );


    }


}