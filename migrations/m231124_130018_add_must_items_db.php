<?php

use yii\db\Migration;

/**
 * Class m231124_130018_add_must_items_db
 */
class m231124_130018_add_must_items_db extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $this->createTable('highscore', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'score' => $this->integer()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);
        $this->addForeignKey("fk_highscore_userid", "highscore", "user_id", "user", "id");

        $this->createTable('event', [
            'id' => $this->primaryKey(),
            'name' => $this->char(60)->notNull(),
            'message' => $this->text()->notNull(),
            'start_date' => $this->dateTime()->notNull(),
            'end_date' => $this->dateTime()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);


        $this->createTable('event_members', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'event_id' => $this->integer()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);
        $this->addForeignKey("fk_event_members_userid", "event_members", "user_id", "user", "id");
        $this->addForeignKey("fk_event_members_eventid", "event_members", "event_id", "event", "id");


        $this->createTable('merchandise', [
            'id' => $this->primaryKey(),
            'name' => $this->char(60)->notNull(),
            'category' => $this->char(60),
            'price' => $this->double()->notNull(),
            'payment_option' => $this->char(60)->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);


        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->char(60)->notNull(),
            'message' => $this->text()->notNull(),
            'visible' => $this->tinyInteger()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);


        $this->createTable('tournament', [
            'id' => $this->primaryKey(),
            'name' => $this->char(60)->notNull(),
            'message' => $this->text()->notNull(),
            'start_date' => $this->datetime()->notNull(),
            'end_date' => $this->datetime()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);

        $this->createTable('tournament_battle', [
            'id' => $this->primaryKey(),
            'tournament_id' => $this->integer()->notNull(),
            'user1_id' => $this->integer()->notNull(),
            'user2_id' => $this->integer()->notNull(),
            'start_date' => $this->datetime()->notNull(),
            'end_date' => $this->datetime()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);
        $this->addForeignKey("fk_tournament_battle_tournament_id", "tournament_battle", "tournament_id", "tournament", "id");
        $this->addForeignKey("fk_tournament_battle_user1_id", "tournament_battle", "user1_id", "user", "id");
        $this->addForeignKey("fk_tournament_battle_user2_id", "tournament_battle", "user2_id", "user", "id");

    }

    public function down()
    {
        $this->dropTable('highscore');
        $this->dropTable('event');
        $this->dropTable('event_members');
        $this->dropTable('merchandise');
        $this->dropTable('news');
        $this->dropTable('tournament');
        $this->dropTable('tournament_battle');
    }
}
