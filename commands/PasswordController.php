<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class PasswordController extends Controller
{

    public function actionHash($password)
    {
        echo Yii::$app->security->generatePasswordHash($password);
    }

}