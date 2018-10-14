<?php
/**
 * Created by PhpStorm.
 * User: uCraft
 * Date: 14.10.2018
 * Time: 13:47
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        $text = 'Список команд:' . PHP_EOL.
            '1. init-role - Инициализация ролей';

        echo $text;
    }

    public function actionInitRole()
    {
        $admin = \Yii::$app->authManager->createRole('admin');
        $admin->description = 'Администратор';
        \Yii::$app->authManager->add($admin);

        $reader = \Yii::$app->authManager->createRole('reader');
        $reader->description = 'Читатель';
        \Yii::$app->authManager->add($reader);

        $author = \Yii::$app->authManager->createRole('author');
        $author->description = 'Автор';
        \Yii::$app->authManager->add($author);


        $workArticle = \Yii::$app->authManager->createPermission('workArticle');
        $workArticle->description = 'Право на создании статьи';
        \Yii::$app->authManager->add($workArticle);

        $deleteComment = \Yii::$app->authManager->createPermission('deleteComment');
        $deleteComment->description = 'Право на создании статьи';
        \Yii::$app->authManager->add($deleteComment);

        \Yii::$app->authManager->addChild($author, $workArticle);
        \Yii::$app->authManager->addChild($author, $deleteComment);
        \Yii::$app->authManager->addChild($admin, $author);


        $userRole = \Yii::$app->authManager->getRole('admin');
        \Yii::$app->authManager->assign($userRole, 1);

        echo 'Все роли созданы успешно. Для root-пользователя назначена роль Admin';

    }
}