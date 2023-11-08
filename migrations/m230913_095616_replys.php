<?php

use yii\db\Migration;

/**
 * Class m230913_095616_replys
 */
class m230913_095616_replys extends Migration
{
//    /**
//     * {@inheritdoc}
//     */
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
//        echo "m230913_095616_replys cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('replys',[
            'id' => $this->primaryKey(),
            'form_id' => $this->integer()->notNull(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);
        $this->addForeignKey("fk_form_formid","replys","form_id","form","id",);
    }

    public function down()
    {
        $this->dropTable('replys');
    }

}
