<?php

use yii\db\Migration;

class m160906_091901_create_user extends Migration
{
    public function up()
    {

        $this->createTable('admins',[
            'id'=>$this->primaryKey(),
            'login'=>$this->string(40)->unique()->notNull(),
            'password'=>$this->string(32)->notNull(),
            'email'=>$this->string(45)->unique()->notNull(),
        ]);

    }

    public function down()
    {

        $this->dropTable('admins');

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
