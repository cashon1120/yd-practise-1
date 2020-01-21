<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\User;
Yii::$app->response->format=Response::FORMAT_JSON;

class UserController extends Controller
{
    public $enableCsrfValidation=false;

    public function actionIndex(){
        return 1;
    }
}
