<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\RegisterForm;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\PersonForm;

class OptpolymerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionPvh() {
        return $this->render('paneli_pvh');
    }

    public function actionMdf() {
        return $this->render('mdf_hdf');
    }

    public function actionFasadka() {
        return $this->render('fasadka');
    }

    public function actionAccesuar() {
        return $this->render('accessuar');
    }
    
    public function actionLk() {
	if (Yii::$app->user->isGuest)
		return $this->goHome();

        return $this->render('lk');
    }
    
    public function actionShowperson() {
	if (Yii::$app->user->isGuest)
		return $this->goHome();

	$model = new PersonForm();
	if ($model->load(Yii::$app->request->post()) && $model->save_person()) {
		return $this->redirect(['showperson']);
        }
        
        $model->show_person();

        return $this->render('person', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            //return $this->goBack();
		return $this->redirect(['lk']);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);

    }

	public function actionRegister() {

		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new RegisterForm();

		if ($model->load(Yii::$app->request->post()) && $model->register()) {
			return $this->goBack();
		}

		return $this->render('register', [
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
