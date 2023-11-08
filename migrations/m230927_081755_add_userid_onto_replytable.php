<?php

use yii\db\Migration;

/**
 * Class m230927_081755_add_userid_onto_replytable
 */
class m230927_081755_add_userid_onto_replytable extends Migration
{
    /**
     * {@inheritdoc}
     */


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('replys','user_id','int');
        $this->addForeignKey('fk_user_id','replys','user_id','user','id');
    }

    public function down()
    {
        $this->dropColumn('replys', 'user_id');
    }

}
