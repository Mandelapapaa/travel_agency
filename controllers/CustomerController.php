<?php

namespace app\controllers;

use app\models\Customer;
use app\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new CustomerSearch();

        $dataProvider = $searchModel->search(
            $this->request->queryParams
        );


        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);

    }




    /**
     * Displays a single Customer model.
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
     * Creates a new Customer model.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new Customer();


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
     * Updates an existing Customer model.
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
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     *
     * @param int $id
     * @return Customer
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {

        if (($model = Customer::findOne(['id' => $id])) !== null) {

            return $model;

        }


        throw new NotFoundHttpException(
            'The requested page does not exist.'
        );

    }

}