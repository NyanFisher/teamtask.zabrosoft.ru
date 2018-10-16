<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group_project`.
 * Has foreign keys to the tables:
 *
 * - `group`
 * - `project`
 */
class m181016_064746_create_junction_table_for_group_and_project_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group_project', [
            'group_id' => $this->integer(),
            'project_id' => $this->integer(),
            'PRIMARY KEY(group_id, project_id)',
        ]);

        // creates index for column `group_id`
        $this->createIndex(
            'idx-group_project-group_id',
            'group_project',
            'group_id'
        );

        // add foreign key for table `group`
        $this->addForeignKey(
            'fk-group_project-group_id',
            'group_project',
            'group_id',
            'group',
            'id',
            'CASCADE'
        );

        // creates index for column `project_id`
        $this->createIndex(
            'idx-group_project-project_id',
            'group_project',
            'project_id'
        );

        // add foreign key for table `project`
        $this->addForeignKey(
            'fk-group_project-project_id',
            'group_project',
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
        // drops foreign key for table `group`
        $this->dropForeignKey(
            'fk-group_project-group_id',
            'group_project'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            'idx-group_project-group_id',
            'group_project'
        );

        // drops foreign key for table `project`
        $this->dropForeignKey(
            'fk-group_project-project_id',
            'group_project'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            'idx-group_project-project_id',
            'group_project'
        );

        $this->dropTable('group_project');
    }
}
