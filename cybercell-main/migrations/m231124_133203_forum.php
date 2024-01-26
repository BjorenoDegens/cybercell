<?php

use yii\db\Migration;

/**
 * Class m231124_133203_forum
 */
class m231124_133203_forum extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('forum', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->char(60)->notNull(),
            'message' => $this->text()->notNull(),
            'visible' => $this->tinyInteger()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);

        // The corrected addForeignKey method call
        $this->addForeignKey("fk_forum_userid", "forum", "user_id", "user", "id", "CASCADE", "CASCADE");
    }

    public function down()
    {
        $this->dropTable("forum");
    }
}
