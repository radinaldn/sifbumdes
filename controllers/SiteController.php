<?php

namespace app\controllers;

use yii\helpers\Url;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
// untuk bisa memanggil method yang di model user, jangan lupa namespace nya
use app\models\User;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'hash'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    /**
     * @inheritdoc
     */
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

    // method hashhing password
    public function actionHash($password){
        echo Yii::$app->security->generatePasswordHash($password);
        exit();
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        // demo melempar varable
//        $a= 10;
//        $b= 20;
//
//        // lakukan roces
//        $hasil= $a+$b;
//
//        // ini data dari model
//        // cara manggil, jadikan class itu sebagi objek
//        $ini_user = new User();
//        $tampung_model = $ini_user->dataModel();
//
//
//
//        //coba lempar variabel ke view
//        // cara membaca: mengembalikan render view dengan nama index.php
        //return $this->render('index', ['ini_hasil'=>$hasil, 'ini_data_model'=>$tampung_model]);

        if(Yii::$app->user->isGuest){
            return $this->goLogin();
        }

        return $this->redirect(['home/index']);

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(Url::to(['home/index']));
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
