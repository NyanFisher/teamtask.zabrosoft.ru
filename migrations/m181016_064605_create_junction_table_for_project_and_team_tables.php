<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project_team`.
 * Has foreign keys to the tables:
 *
 * - `project`
 * - `team`
 */
class m181016_064605_create_junction_table_for_project_and_team_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project_team', [
            'project_id' => $this->integer(),
            'team_id' => $this->integer(),
            'PRIMARY KEY(project_id, team_id)',
        ]);

        // creates index for column `project_id`
        $this->createIndex(
            'idx-project_team-project_id',
            'project_team',
            'project_id'
        );

        // add foreign key for table `project`
        $this->addForeignKey(
            'fk-project_team-project_id',
            'project_team',
            'project_id',
            'project',
            'id',
            'CASCADE'
        );

        // creates index for column `team_id`
        $this->createIndex(
            'idx-project_team-team_id',
            'project_team',
            'team_id'
        );

        // add foreign key for table `team`
        $this->addForeignKey(
            'fk-project_team-team_id',
            'project_team',
            'team_id',
            'team',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `project`
        $this->dropForeignKey(
            'fk-project_team-project_id',
            'project_team'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            'idx-project_team-project_id',
            'project_team'
        );

        // drops foreign key for table `team`
        $this->dropForeignKey(
            'fk-project_team-team_id',
            'project_team'
        );

        // drops index for column `team_id`
        $this->dropIndex(
            'idx-project_team-team_id',
            'project_team'
        );

        $this->dropTable('project_team');
    }
}
