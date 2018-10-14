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
        $text = 'Список команд:' . PHP_EOL.
            '1. init-root-user - Добавление первого Root пользователя';

        echo $text;
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
            echo 'Пользователь root уже существует в базе данных';
        }
    }
}