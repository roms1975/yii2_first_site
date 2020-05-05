<?php

namespace app\models;
use Yii;

class User_opt extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $user;

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = Optusers::findOne($id);
        if (empty($user))
            return null;
        
        self::$user = array(
            'id' => $user->id,
            'username' => $user->email,
            'password' => $user->pass,
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        );
        
        return new static(self::$user);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {   
    
        if ($user = Optusers::find()->where(['email' => $username])->one()) {
            self::$user = array(
                    'id' => $user->id,
                    'username' => $user->email,
                    'password' => $user->pass,
                    'authKey' => 'test101key',
                    'accessToken' => '101-token',
            );
            
            return new static(self::$user);
        }
        
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
