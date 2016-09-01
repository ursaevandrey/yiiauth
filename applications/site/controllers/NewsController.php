<?php

namespace site\controllers;

use yii;
use yii\filters\VerbFilter;

use site\components\Controller;
use site\models\LoginForm;

class NewsController extends Controller{

    public function behaviors(){
        return [
            'access' => [
                'class' => yii\filters\AccessControl::class,
                'only' => ['index', 'view', 'only-guest'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['only-guest'],
                        'roles' => ['?'],
                    ],
                ]
            ],
        ];
    }

    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex(){
        return 'This is News::index';
    }

    public function actionView(){
        return 'This is News::view';
    }

    public function actionAllow(){
        return 'This is News::allow';
    }

    public function actionOnlyGuest(){
        return 'This is News::OnlyGuest';
    }

}