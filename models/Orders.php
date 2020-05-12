<?php

namespace app\models;

use Yii;

class Orders extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }

}
