<?php

use yii\db\Migration;

/**
 * Class m231124_134837_insert_replys_into_db
 */
class m231124_134837_insert_replys_into_db extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('replys',[
            'id' => $this->primaryKey(),
            'forum_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);

        // The corrected addForeignKey method call
        $this->addForeignKey("fk_replys_forumid", "replys", "forum_id", "forum", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("fk_replys_userid", "replys", "user_id", "user", "id", "CASCADE", "CASCADE");
    }

    public function down()
    {
        $this->dropTable('replys');
    }
}
