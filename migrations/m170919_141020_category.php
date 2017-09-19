<?php

use yii\db\Migration;

class m170919_141020_category extends Migration
{

    public function up()
    {
        $this->createTable( 'category', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'status' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
