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
            [['email'], 'validateEmail'],
            [['password'], 'validatePassword'],
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
    
    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!preg_match("/^[a-zA-Z0-9_\.\-]+@/", $this->email))
                $this->addError($attribute, 'Не правильно введен e-mail');
        }
        
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
        $email = $this->email;
        $opt = new Optusers;
        if ($opt->find()->where(['email' => $email])->one()) {
            $this->addError('email', 'Такой email уже зарегистрирован');
            return false;
        }
        
        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
            $opt->email = $this->email;
            $opt->pass = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            $opt->save();
            
            return true;
        }
        
//        $this->addError($attribute, 'Такой email уже зарегистрирован');
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
