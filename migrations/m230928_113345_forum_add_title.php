<?php

use yii\db\Migration;

/**
 * Class m230928_113345_forum_add_title
 */
class m230928_113345_forum_add_title extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('form','title','VARCHAR(64)');
    }

    public function down()
    {
        $this->dropColumn('form','title');
    }

}
