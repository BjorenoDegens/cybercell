<?php

use yii\db\Migration;

/**
 * Class m230913_074055_form
 */
class m230913_074055_form extends Migration
{
    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m230913_074055_form cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('form',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'message' => $this->text()->notNull(),
            'visible' => $this->tinyInteger()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);
        $this->addForeignKey("fk_form_userid","form","user_id","user","id",);
    }

    public function down()
    {
        $this->dropTable("form");
    }

}
