<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group`.
 */
class m181016_053216_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'project_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10)
        ]);

        $this->createIndex(
            'idx-group-project_id',
            'group',
            'project_id'
        );

        $this->addForeignKey(
            'fk-group-project_id',
            'group',
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
        $this->dropTable('group');
    }
}
