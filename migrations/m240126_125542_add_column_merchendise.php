<?php

use yii\db\Migration;

/**
 * Class m240126_125542_add_column_merchendise
 */
class m240126_125542_add_column_merchendise extends Migration
{
    /**
     * {@inheritdoc}
     */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn("merchandise","imgname","varchar(60)");
    }

    public function down()
    {
        $this->dropColumn("merchandise","imgname");
    }

}
