<?php

namespace app\models;

use Yii;

class Offers extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'offers';
    }
	
	public function getOffers($cat) {
		if (empty($cat))
			return false;
		
//		$data = self::find()->where(['not', ['count' => '0']])->all();
		$data = self::find()->where(['category' => $cat])->andWhere(['>','count', 0])->all();

		return $data;
	}
}
