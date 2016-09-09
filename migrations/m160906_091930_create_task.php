<?php

use yii\db\Migration;

class m160906_091930_create_task extends Migration
{
    public function up()
    {

        $this->createTable('questions',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(100)->notNull(),
            'type' => $this->string(40)->notNull(),
            'form_id'=>$this->integer()->notNull(),
        ]);

    }

    public function down()
    {

        $this->dropTable('questions');

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
