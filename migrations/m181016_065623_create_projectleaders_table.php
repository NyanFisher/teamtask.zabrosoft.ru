<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projectleaders`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `project`
 */
class m181016_065623_create_projectleaders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('projectleaders', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'project_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-projectleaders-user_id',
            'projectleaders',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-projectleaders-user_id',
            'projectleaders',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `project_id`
        $this->createIndex(
            'idx-projectleaders-project_id',
            'projectleaders',
            'project_id'
        );

        // add foreign key for table `project`
        $this->addForeignKey(
            'fk-projectleaders-project_id',
            'projectleaders',
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
            'fk-projectleaders-user_id',
            'projectleaders'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-projectleaders-user_id',
            'projectleaders'
        );

        // drops foreign key for table `project`
        $this->dropForeignKey(
            'fk-projectleaders-project_id',
            'projectleaders'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            'idx-projectleaders-project_id',
            'projectleaders'
        );

        $this->dropTable('projectleaders');
    }
}
