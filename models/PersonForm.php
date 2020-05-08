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
class PersonForm extends Model
{
    public $name;
    public $surename;
    public $phone;
    public $id; 

    private $_id = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'surename', 'phone'], 'required'],
            // rememberMe must be a boolean value

        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Имя',
            'surename' => 'Фамилия',
            'phone' => 'Телефон',
        ];
    }
    
public function show_person() {
        $person = new Person;
	$this->id = Yii::$app->user->getId();
	$data = $person->find()->where(['id' => $this->id])->one();
        if (empty($data))
                return true;
        
        $this->name = $data->name;
        $this->surename = $data->surename;
        $this->phone = $data->phone;
	
	return true;
    }
    
public function save_person() {
	$person = Person::find()->where(['id' => Yii::$app->user->getId()])->one();
			
	if (empty($person)) {
		$person = new Person;
		if ($this->validate()) {
			$person->id = Yii::$app->user->getId();
			$person->name = $this->name;
			$person->surename = $this->surename;
			$person->phone = $this->phone;
			$person->save();

			//error_log(print_r($person, true), 3, "/home/roman/www/roms.model.log");
			return true;
		}
	}

	if ($this->validate()) {
		$person->name = $this->name;
		$person->surename = $this->surename;
		$person->phone = $this->phone;
		$person->update();

		//error_log(print_r($person, true), 3, "/home/roman/www/roms.model.log");
		return true;
	}
        
        return false;
    }
}
