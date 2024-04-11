<?php

namespace app\controllers;

use app\models\SignInForm;
use app\models\SignUpForm;
use Yii;
use yii\web\Controller;
use yii\web\NotAcceptableHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class UserController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionSignUp()
    {
        $model = new SignUpForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->signUp()) {
                return $this->redirect('sign-in');
            }
        }
        return $this->render('sign-up', [
            'model' => $model,
        ]);
    }

    public function actionSignIn()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignInForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('sign-in', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}