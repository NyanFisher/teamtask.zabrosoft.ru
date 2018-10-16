<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_project`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `project`
 */
class m181016_064406_create_junction_table_for_user_and_project_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_project', [
            'user_id' => $this->integer(),
            'project_id' => $this->integer(),
            'PRIMARY KEY(user_id, project_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_project-user_id',
            'user_project',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_project-user_id',
            'user_project',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `project_id`
        $this->createIndex(
            'idx-user_project-project_id',
            'user_project',
            'project_id'
        );

        // add foreign key for table `project`
        $this->addForeignKey(
            'fk-user_project-project_id',
            'user_project',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_project-user_id',
            'user_project'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_project-user_id',
            'user_project'
        );

        // drops foreign key for table `project`
        $this->dropForeignKey(
            'fk-user_project-project_id',
            'user_project'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            'idx-user_project-project_id',
            'user_project'
        );

        $this->dropTable('user_project');
    }
}
