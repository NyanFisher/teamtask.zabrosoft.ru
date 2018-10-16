<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_team`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `team`
 */
class m181016_064305_create_junction_table_for_user_and_team_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_team', [
            'user_id' => $this->integer(),
            'team_id' => $this->integer(),
            'PRIMARY KEY(user_id, team_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_team-user_id',
            'user_team',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_team-user_id',
            'user_team',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `team_id`
        $this->createIndex(
            'idx-user_team-team_id',
            'user_team',
            'team_id'
        );

        // add foreign key for table `team`
        $this->addForeignKey(
            'fk-user_team-team_id',
            'user_team',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_team-user_id',
            'user_team'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_team-user_id',
            'user_team'
        );

        // drops foreign key for table `team`
        $this->dropForeignKey(
            'fk-user_team-team_id',
            'user_team'
        );

        // drops index for column `team_id`
        $this->dropIndex(
            'idx-user_team-team_id',
            'user_team'
        );

        $this->dropTable('user_team');
    }
}
