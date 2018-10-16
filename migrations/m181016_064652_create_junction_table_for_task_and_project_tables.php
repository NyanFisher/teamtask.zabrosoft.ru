<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task_project`.
 * Has foreign keys to the tables:
 *
 * - `task`
 * - `project`
 */
class m181016_064652_create_junction_table_for_task_and_project_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task_project', [
            'task_id' => $this->integer(),
            'project_id' => $this->integer(),
            'PRIMARY KEY(task_id, project_id)',
        ]);

        // creates index for column `task_id`
        $this->createIndex(
            'idx-task_project-task_id',
            'task_project',
            'task_id'
        );

        // add foreign key for table `task`
        $this->addForeignKey(
            'fk-task_project-task_id',
            'task_project',
            'task_id',
            'task',
            'id',
            'CASCADE'
        );

        // creates index for column `project_id`
        $this->createIndex(
            'idx-task_project-project_id',
            'task_project',
            'project_id'
        );

        // add foreign key for table `project`
        $this->addForeignKey(
            'fk-task_project-project_id',
            'task_project',
            'project_id',
            'project',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `task`
        $this->dropForeignKey(
            'fk-task_project-task_id',
            'task_project'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            'idx-task_project-task_id',
            'task_project'
        );

        // drops foreign key for table `project`
        $this->dropForeignKey(
            'fk-task_project-project_id',
            'task_project'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            'idx-task_project-project_id',
            'task_project'
        );

        $this->dropTable('task_project');
    }
}
