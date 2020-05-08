<?php

namespace app\models;

use Yii;

class Person extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'person';
    }

}
