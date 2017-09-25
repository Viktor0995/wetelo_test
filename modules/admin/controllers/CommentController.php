<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 24.09.2017
 * Time: 18:49
 */

namespace app\modules\admin\controllers;


use app\models\Comment;
use Yii;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionIndex()
    {
        $comments = Comment::find()->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('index', compact('comments'));
    }

    public  function  actionDelete($id)
    {
        $comment = Comment::findOne($id);
        if($comment->delete())
        {
            return $this->redirect(['comment/index']);
        }
    }

    public  function  actionAllow($id)
    {
        $comment = Comment::findOne($id);
        if($comment->allow())
        {
            return $this->redirect(['index']);
        }
    }

    public  function  actionDisallow($id)
    {
        $comment = Comment::findOne($id);
        if($comment->disallow())
        {
            return $this->redirect(['index']);
        }
    }
}