<?php

namespace app\controllers;

use app\models\Package;
use app\models\PackageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;


/**
 * PackageController implements the CRUD actions for Package model.
 */
class PackageController extends Controller
{

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




    public function actionIndex()
    {

        $searchModel = new PackageSearch();

        $dataProvider = $searchModel->search(
            $this->request->queryParams
        );


        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);

    }




    public function actionView($id)
    {

        return $this->render('view', [

            'model' => $this->findModel($id),

        ]);

    }




    public function actionCreate()
    {

        $model = new Package();



        if ($this->request->isPost) {


            if ($model->load($this->request->post())) {


                $model->image = UploadedFile::getInstance(
                    $model,
                    'image'
                );


                if ($model->image) {


                    $fileName = $model->image->baseName . '.' . $model->image->extension;


                    $model->image->saveAs(
                        'uploads/' . $fileName
                    );


                    $model->image = $fileName;

                }



                if ($model->save()) {

                    return $this->redirect([
                        'view',
                        'id' => $model->id
                    ]);

                }

            }


        } else {


            $model->loadDefaultValues();

        }



        return $this->render('create', [

            'model' => $model,

        ]);

    }




    public function actionUpdate($id)
    {

        $model = $this->findModel($id);


        $oldImage = $model->image;



        if ($this->request->isPost && $model->load($this->request->post())) {


            $model->image = UploadedFile::getInstance(
                $model,
                'image'
            );



            if ($model->image) {


                $fileName = $model->image->baseName . '.' . $model->image->extension;


                $model->image->saveAs(
                    'uploads/' . $fileName
                );


                $model->image = $fileName;



            } else {


                $model->image = $oldImage;


            }



            if ($model->save()) {


                return $this->redirect([
                    'view',
                    'id' => $model->id
                ]);

            }

        }



        return $this->render('update', [

            'model' => $model,

        ]);

    }





    public function actionDelete($id)
    {

        $this->findModel($id)->delete();


        return $this->redirect(['index']);

    }





    protected function findModel($id)
    {

        if (($model = Package::findOne(['id' => $id])) !== null) {


            return $model;


        }


        throw new NotFoundHttpException(
            'The requested page does not exist.'
        );

    }

}