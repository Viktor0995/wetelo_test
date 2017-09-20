<?php

use yii\db\Migration;

class m170919_141119_postimage extends Migration
{

    public function up()
    {
        $this->createTable( 'postimage', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'post_id' => $this->integer(),
        ]);

        $this->createIndex(
            'img_post_post_id',
            'postimage',
            'post_id'
        );

        $this->addForeignKey(
            'img_post_post_id',
            'postimage',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('postimage');
    }
}
