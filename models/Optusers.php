<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property int $population
 */
class Optusers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

}
