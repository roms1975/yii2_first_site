<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Optusers;
/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $email;
    public $password;
    public $pass_retype;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password', 'pass_retype'], 'required'],
            // password is validated by validatePassword()
            //[['password', 'pass_retype'], 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();

            if ($this->password !== $this->pass_retype) {
                $this->addError($attribute, 'Пароли не совпадают');
            }
 //       }
    }
    
    public function attributeLabels() {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'pass_retype' => 'Повторите пароль',
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function register() {
        $opt = new Optusers;

        if ($this->validate() && !$opt->email_exist($this->email)) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
            $opt->email = $this->email;
            $opt->pass = $this->password;
            $opt->save();
            
            return true;
        }
        
        //$this->addError($attribute, 'Такой email уже зарегистрирован');
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
