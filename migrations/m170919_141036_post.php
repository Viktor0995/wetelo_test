<?php

use yii\db\Migration;

class m170919_141036_post extends Migration
{

    public function up()
    {
        $this->createTable( 'post', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'content' => $this->text(),
            'category_id' => $this->integer(),
            'status' => $this->integer(),
            'pub_date' => $this->date(),
        ]);
    }

    public function down()
    {
        $this->dropTable('post');
    }
}
