<?php

namespace app\models;

use Yii;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }
	
	public function getCategories() {
		$id = Yii::$app->user->getId();
		$data = self::find()->all();
		
		return $data;
	}
}
