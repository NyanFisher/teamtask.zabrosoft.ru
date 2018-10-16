<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_task`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `task`
 */
class m181016_064723_create_junction_table_for_user_and_task_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_task', [
            'user_id' => $this->integer(),
            'task_id' => $this->integer(),
            'PRIMARY KEY(user_id, task_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_task-user_id',
            'user_task',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_task-user_id',
            'user_task',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `task_id`
        $this->createIndex(
            'idx-user_task-task_id',
            'user_task',
            'task_id'
        );

        // add foreign key for table `task`
        $this->addForeignKey(
            'fk-user_task-task_id',
            'user_task',
            'task_id',
            'task',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_task-user_id',
            'user_task'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_task-user_id',
            'user_task'
        );

        // drops foreign key for table `task`
        $this->dropForeignKey(
            'fk-user_task-task_id',
            'user_task'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            'idx-user_task-task_id',
            'user_task'
        );

        $this->dropTable('user_task');
    }
}
