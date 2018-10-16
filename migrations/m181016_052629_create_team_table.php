<?php

use yii\db\Migration;

/**
 * Handles the creation of table `team`.
 */
class m181016_052629_create_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('team', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'city' => $this->integer(),
            'user_id' => $this->integer()->notNull(),
            'date_at' => $this->date()->notNull(),
            'type' => $this->integer(),
            'is_lock' => $this->integer(2),
            'status' => $this->smallInteger()->notNull()->defaultValue(10)
        ]);

        $this->createIndex(
            'idx-team-user_id',
            'team',
            'user_id'
        );

        $this->addForeignKey(
            'fk-team-user_id',
            'team',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('team');
    }
}
