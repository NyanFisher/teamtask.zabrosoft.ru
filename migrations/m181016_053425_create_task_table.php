<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m181016_053425_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'user_id' => $this->integer(),
            'project_id' => $this->integer(),
            'date_at' => $this->date(),
            'timeline' => $this->date(),
            'date_done' => $this->date(),
            'group_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10)
        ]);

        $this->createIndex(
            'idx-task-user_id',
            'task',
            'user_id'
        );

        $this->addForeignKey(
            'fk-task-user_id',
            'task',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-task-project_id',
            'task',
            'project_id'
        );

        $this->addForeignKey(
            'fk-task-project_id',
            'task',
            'project_id',
            'project',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-task-group_id',
            'task',
            'group_id'
        );

        $this->addForeignKey(
            'fk-task-group_id',
            'task',
            'group_id',
            'group',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
    }
}
