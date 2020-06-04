<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\Request;
use yii\filters\VerbFilter;
use app\models\Orders;
use app\models\Offers;
use app\models\Category;

class OrdersController extends Controller
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
                //'actions' => [ 'logout' => ['post'],],
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

	public function actionIndex() {
		if (Yii::$app->user->isGuest)
			return $this->goHome();
		
		$model = Orders::getOrders();
		return $this->render('orders', [
			'model' => $model
		]);
	}
	
	public function actionCreate() {
		if (Yii::$app->user->isGuest)
			return $this->goHome();
		
		$params = Yii::$app->request->get();
		$categories = Category::getCategories();
		$model = "";
		$current_cat_id = "";
		
		if (!empty($params['id'])) {
			$current_cat_id = $params['id'];
			$model = Offers::getOffers($params['id']);
		}

		return $this->render('offers', [
			'model' => $model,
			'categories' => $categories,
			'current_cat_id' => $current_cat_id
		]);
	}
	
	public function actionChekout() {
		$order = isset($_COOKIE['order']) ? $_COOKIE['order'] : "";
		$offers = json_decode($order, true);
		$data = Offers::getOffersById(array_keys($offers));
		//error_log(print_r($offers, true), 3, "/home/roman/www/roms.log");
		
		return $this->render('chechout',[
			'model' => $data
		]);
	}
}
