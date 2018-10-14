<?php
/**
 * Created by PhpStorm.
 * User: uCraft
 * Date: 14.10.2018
 * Time: 12:20
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;

class DbController extends Controller
{
    public $password;
    public $username = 'root';

    public function optionAliases()
    {
        return [
            'pas' => 'password',
            'n' => 'username',
        ];
    }

    public function options($actionID)
    {
        return [
            'password',
            'username',
        ];
    }

    public function actionIndex()
    {
        echo 'Контроллер для работы с базой данных.';
    }

    public function actionInitRootUser()
    {
        if (!$this->password){
            echo 'Не ввели пароль';
            return 1;
        }

        $model = User::findByUsername($this->username);
        if (empty($model)){
            $user = new User();
            $user->username = 'root';
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()){
                echo 'Пользователь ' . $this->username . ' успешно добавлен в базу данных.';
            }else{
                echo 'Ошибка добавления пользователя';
            }
        }else{
            echo 'Пользователь '. $this->username . ' уже существует в базе данных';
        }
    }
}