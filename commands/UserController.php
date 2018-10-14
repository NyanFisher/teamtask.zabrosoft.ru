<?php
/**
 * Created by PhpStorm.
 * User: uCraft
 * Date: 14.10.2018
 * Time: 13:47
 */

namespace app\commands;

use app\models\User;
use Yii;
use yii\console\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        $text = 'Список команд:' . PHP_EOL .
            '1. init-role - Инициализация ролей' . PHP_EOL .
            '2. update - обновление структуры ролей после изменения';

        echo $text;
    }

    /**
     * @throws \Exception
     */
    public function actionInitRole()
    {
        /* Администратор ресурса */
        $admin = Yii::$app->authManager->createRole('admin');
        $admin->description = 'Администратор';
        Yii::$app->authManager->add($admin);

        /* Руководитель команды */
        $teamleader = Yii::$app->authManager->createRole('teamleader');
        $teamleader->description = 'Руководитель команды';
        Yii::$app->authManager->add($teamleader);

        /* Руководитель проекта */
        $projectleader = Yii::$app->authManager->createRole('projectleader');
        $projectleader->description = 'Руководитель проекта';
        Yii::$app->authManager->add($projectleader);

        /* Исполнитель/Работник */
        $worker = Yii::$app->authManager->createRole('worker');
        $worker->description = 'Исполнитель';
        Yii::$app->authManager->add($worker);


        $isAdmin = Yii::$app->authManager->createPermission('isAdmin');
        $isAdmin->description = 'Право администратора';
        Yii::$app->authManager->add($isAdmin);

        $createTeam = Yii::$app->authManager->createPermission('createTeam');
        $createTeam->description = 'Право на создание команды';
        Yii::$app->authManager->add($createTeam);

        $createProject = Yii::$app->authManager->createPermission('createProject');
        $createProject->description = 'Право на создание проекта';
        Yii::$app->authManager->add($createProject);

        $createTask = Yii::$app->authManager->createPermission('createTask');
        $createTask->description = 'Право на создание задания';
        Yii::$app->authManager->add($createTask);

        $taskExecution = Yii::$app->authManager->createPermission('taskExecution');
        $taskExecution->description = 'Право на выполнение задания';
        Yii::$app->authManager->add($taskExecution);


        \Yii::$app->authManager->addChild($admin, $isAdmin);

        Yii::$app->authManager->addChild($worker, $taskExecution);
        Yii::$app->authManager->addChild($worker, $createTeam);

        Yii::$app->authManager->addChild($projectleader, $createTask);
        Yii::$app->authManager->addChild($projectleader, $taskExecution);

        Yii::$app->authManager->addChild($teamleader, $createProject);
        Yii::$app->authManager->addChild($teamleader, $projectleader);

        $userRole = Yii::$app->authManager->getRole('admin');
        Yii::$app->authManager->assign($userRole, 1);

        echo 'Все роли и права созданы успешно. Для root-пользователя назначена роль Admin';

    }

    public function actionUpdate()
    {
        /* Код для обновления */

        /* Конец кода */

        echo 'Обновление завершено.';
    }
}