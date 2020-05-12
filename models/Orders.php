<?php

namespace app\models;

use Yii;

class Orders extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }
	
	public function getOrders() {
		$id = Yii::$app->user->getId();
		$data = self::find()->where(['person' => $id])->all();
		
		return $data;
	}
}
