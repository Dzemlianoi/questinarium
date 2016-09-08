<?php

use yii\db\Migration;

class m160906_112858_add_foreign extends Migration
{
    public function up()
    {
        $this->addForeignKey('question_id','answers','question_id', 'questions','id');
        $this->addForeignKey('form_id','questions','form_id', 'forms','id');

    }

    public function down()
    {

        $this->dropForeignKey('question_id','answers');
        $this->dropForeignKey('form_id','questions');

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
