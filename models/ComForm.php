<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 24.09.2017
 * Time: 15:51
 */

namespace app\models;


use Yii;
use yii\base\Model;

class ComForm extends Model
{
    public $comment;

    public function rules()
    {
        return[
            [['comment'], 'required'],
            [['comment'], 'string']
        ];
    }

    public function sCom($post_id)
    {
        $comment = new Comment();
        $comment->content = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->post_id = $post_id;
        $date = date('Y-m-d');
        $comment->date_created = Yii::$app->formatter->asDate($date);
        $comment->status = 0;

        return $comment->save();
    }

}