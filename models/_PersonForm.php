<?php

namespace app\models;

use Yii;
use yii\base\Model;
//use app\models\Person;
/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class PersonForm extends Model
{
    public $name;
    public $surename;
    public $phone;

    private $_user = false;

    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'surename', 'phone'], 'required'],
            // password is validated by validatePassword()
        ];
    }


    public function show_person() {
        $person = new Person;
	$id = Yii::$app->user->getId();
	$data = $person->find()->where(['id' => $id])->one();
	
	return $data;
    }
	
    public function save_person() {
        $person = new Person;
	
        if ($this->validate()) {
            $person->name = $this->name;
            $person->surename = $this->surename;
            $person->phone = $this->phone;
            $person->save();
            
            return true;
        }
        
        return false;
    }
    
    public function attributeLabels() {
        return [
            'name' => 'Имя',
            'surename' => 'Фамилия',
            'phone' => 'Телефон',
        ];
    }
}
