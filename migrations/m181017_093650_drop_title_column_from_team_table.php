<?php

use yii\db\Migration;

/**
 * Handles dropping title from table `team`.
 */
class m181017_093650_drop_title_column_from_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('team', 'title');
        $this->addColumn('team', 'title', $this->string()->unique()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
