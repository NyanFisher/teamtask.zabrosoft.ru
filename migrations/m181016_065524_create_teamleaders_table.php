<?php

use yii\db\Migration;

/**
 * Handles the creation of table `teamleaders`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `team`
 */
class m181016_065524_create_teamleaders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('teamleaders', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'team_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-teamleaders-user_id',
            'teamleaders',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-teamleaders-user_id',
            'teamleaders',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `team_id`
        $this->createIndex(
            'idx-teamleaders-team_id',
            'teamleaders',
            'team_id'
        );

        // add foreign key for table `team`
        $this->addForeignKey(
            'fk-teamleaders-team_id',
            'teamleaders',
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
            'fk-teamleaders-user_id',
            'teamleaders'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-teamleaders-user_id',
            'teamleaders'
        );

        // drops foreign key for table `team`
        $this->dropForeignKey(
            'fk-teamleaders-team_id',
            'teamleaders'
        );

        // drops index for column `team_id`
        $this->dropIndex(
            'idx-teamleaders-team_id',
            'teamleaders'
        );

        $this->dropTable('teamleaders');
    }
}
