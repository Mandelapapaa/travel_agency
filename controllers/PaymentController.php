<?php

namespace app\controllers;

use app\models\Payment;
use app\models\PaymentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [

                // LOGIN PROTECTION
                'access' => [

                    'class' => AccessControl::class,

                    'rules' => [

                        [

                            'actions' => [

                                'index',
                                'view',
                                'create',
                                'update',
                                'delete'

                            ],

                            'allow' => true,

                            'roles' => ['@'],

                        ],

                    ],

                ],



                'verbs' => [

                    'class' => VerbFilter::className(),

                    'actions' => [

                        'delete' => ['POST'],

                    ],

                ],

            ]
        );
    }





    /**
     * Lists all Payment models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new PaymentSearch();

        $dataProvider = $searchModel->search(
            $this->request->queryParams
        );


        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);

    }




    /**
     * Displays a single Payment model.
     *
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {

        return $this->render('view', [

            'model' => $this->findModel($id),

        ]);

    }





    /**
     * Creates a new Payment model.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new Payment();



        if ($this->request->isPost) {


            if ($model->load($this->request->post()) && $model->save()) {


                return $this->redirect([

                    'view',

                    'id' => $model->id,

                ]);

            }


        } else {


            $model->loadDefaultValues();


        }



        return $this->render('create', [

            'model' => $model,

        ]);

    }





    /**
     * Updates an existing Payment model.
     *
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);



        if (

            $this->request->isPost &&

            $model->load($this->request->post()) &&

            $model->save()

        ) {


            return $this->redirect([

                'view',

                'id' => $model->id,

            ]);

        }



        return $this->render('update', [

            'model' => $model,

        ]);

    }





    /**
     * Deletes an existing Payment model.
     *
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();


        return $this->redirect(['index']);

    }





    /**
     * Finds the Payment model based on its primary key value.
     *
     * @param int $id
     * @return Payment
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {

        if (($model = Payment::findOne(['id' => $id])) !== null) {


            return $model;


        }


        throw new NotFoundHttpException(
            'The requested page does not exist.'
        );

    }

}