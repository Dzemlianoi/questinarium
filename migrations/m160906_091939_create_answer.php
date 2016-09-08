<?php

use yii\db\Migration;

class m160906_091939_create_answer extends Migration
{
    public function up()
    {

        $this->createTable('answers',[
            'id'=>$this->primaryKey(),
            'answer'=>$this->string(40)->unique()->notNull(),
            'question_id'=>$this->integer(11),
        ]);

    }

    public function down()
    {

        $this->dropTable('answers');

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
