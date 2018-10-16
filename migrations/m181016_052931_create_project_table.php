<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project`.
 */
class m181016_052931_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'team_id' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'date_at' => $this->date(),
            'timeline' => $this->date(),
            'is_lock' => $this->smallInteger()->notNull()->defaultValue(0),
            'is_done' => $this->smallInteger()->notNull()->defaultValue(0),
        ]);

        $this->createIndex(
        'idx-project-user_id',
        'project',
        'user_id'
    );

        $this->addForeignKey(
            'fk-project-user_id',
            'project',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-project-team_id',
            'project',
            'team_id'
        );

        $this->addForeignKey(
            'fk-project-team_id',
            'project',
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
        $this->dropTable('project');
    }
}
