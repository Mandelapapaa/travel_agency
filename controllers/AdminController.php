<?php

namespace app\controllers;

use app\models\Admin;
use app\models\AdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
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
     * Lists all Admin models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new AdminSearch();

        $dataProvider = $searchModel->search(
            $this->request->queryParams
        );


        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);

    }





    /**
     * Displays a single Admin model.
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
     * Creates a new Admin model.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new Admin();


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
     * Updates an existing Admin model.
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
     * Deletes an existing Admin model.
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
     * Finds the Admin model based on its primary key value.
     *
     * @param int $id
     * @return Admin
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {

        if (($model = Admin::findOne(['id' => $id])) !== null) {


            return $model;


        }


        throw new NotFoundHttpException(
            'The requested page does not exist.'
        );

    }

}