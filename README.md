## Развертка приложения

<ol>
    <li>Применить миграцию для RBAC <br> yii migrate --migrationPath=@yii/rbac/migrations/</li>
    <li>Применить миграцию для таблиц 'yii migrate'</li>
    <li>Выполнить скрипт 'yii db/init-root-user -pas=[пароль]' для добавления первого пользователя root</li>
    <li>Выполнить команду 'yii user/init-role' для инициализации ролей и прав, а так же назначения прав администратора root-пользователю</li>
</ol>