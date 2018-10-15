<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Это поле не может быть пустым'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Пользователь с таким логином уже существует.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required', 'message' => 'Это поле не может быть пустым'],
            ['email', 'email', 'message' => 'Не верный формат почты'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот адрес уже зарегестрирован.'],
            ['password', 'required', 'message' => 'Это поле не может быть пустым'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();

        $role = \Yii::$app->authManager->getRole('worker');
        \Yii::$app->authManager->assign($role, $user->getId());

        return $user;
    }

}