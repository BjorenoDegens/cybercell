<?php

use yii\db\Migration;

/**
 * Class m240124_140136_Addconnection
 */
class m240124_140136_Addconnection extends Migration
{
    /**
     * {@inheritdoc}
     */


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('invoice', [
            'id' => $this->primaryKey(),
            'merchandise_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);

        // Add foreign keys
        $this->addForeignKey("fk_invoice_merchandise_id", "invoice", "merchandise_id", "merchandise", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("fk_invoice_user_id", "invoice", "user_id", "user", "id", "CASCADE", "CASCADE");

        $this->alterColumn("merchandise","price","decimal(4,2)");
    }

    public function down()
    {
        $this->dropTable("invoice");
    }
}
