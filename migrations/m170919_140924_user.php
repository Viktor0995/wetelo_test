<?php

use yii\db\Migration;

class m170919_140924_user extends Migration
{

    public function up()
    {
        $this->createTable( 'user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'email' => $this->string()->defaultValue(null),
            'status' => $this->integer(),
            'role' => $this->integer()->defaultValue(0),
            'password' => $this->string(),
            'password_salt' => $this->string(),
            'datetime_registration' => $this->date(),
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }

}
