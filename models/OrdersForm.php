<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class OrdersForm extends Model
{
    private $_id;
    public $person;
    public $created;
    public $processed; 
    public $manager; 
 
	public function get_orders() {
		$orders = new Orders;
		$this->_id = Yii::$app->user->getId();
		$data = Orders::find()->all();
print_r($data);
		return $data;
	}

}
