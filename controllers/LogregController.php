<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 22.09.2017
 * Time: 14:14
 */

namespace app\controllers;


use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\web\Controller;

class LogregController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
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

    public function actionSignup()
    {
       $model = new SignupForm();
       if(Yii::$app->request->post())
       {
           $model->load(Yii::$app->request->post());
           if($model->signup())
           {
               return $this->redirect(['logreg/login']);
           }
       }

        return $this->render('signup', compact('model'));
    }

}