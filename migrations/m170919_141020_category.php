<?php

use yii\db\Migration;

class m170919_141020_category extends Migration
{

    public function up()
    {
        $this->createTable( 'category', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'title' => $this->text(),
            'status' => $this->integer(),
            'description' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
