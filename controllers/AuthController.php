<?php

namespace app\controllers;

use app\models\Login;
use Yii;
use yii\web\Controller;


class AuthController extends Controller
{


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
    


    public function actionLogin()
    {

        $login_model = new Login();
        if(Yii::$app->request->post('Login')){
            $login_model->attributes = Yii::$app->request->post('Login');
            if ($login_model->validate()) {
              Yii::$app->user->login($login_model->getUser());
                $message = Yii::$app->user->identity->name . " здравствуйте вы успешно авторизировались на сайте";
                Yii::$app->session->setFlash('success', "$message");
                return $this->redirect('/admin');
            }
        }
        return $this->render('login', [
            'model' => $login_model,
        ]);
    }

}