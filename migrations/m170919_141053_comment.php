<?php

use yii\db\Migration;

class m170919_141053_comment extends Migration
{

    public function up()
    {
        $this->createTable( 'comment', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer(),
            'content' => $this->text(),
            'user_id' => $this->integer(),
            'date_created' => $this->date(),
            'status' => $this->integer(),
        ]);

        $this->createIndex(
            'idx_post_user_id',
            'comment',
            'user_id'
         );

        $this->addForeignKey(
            'fk_post_user_id',
            'comment',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx_post_id',
            'comment',
            'post_id'
        );

        $this->addForeignKey(
            'fk_post_id',
            'comment',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('comment');
    }

}
