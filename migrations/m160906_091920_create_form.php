<?php

use yii\db\Migration;

class m160906_091920_create_form extends Migration
{
    public function up()
    {

        $this->createTable('forms',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(40)->unique()->notNull(),
            'order'=>$this->smallInteger()->unique()->notNull(),
        ]);

    }

    public function down()
    {

        $this->dropTable('forms');

    }

}
