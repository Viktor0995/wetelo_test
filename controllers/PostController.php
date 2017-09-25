<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 21.09.2017
 * Time: 21:05
 */

namespace app\controllers;


use app\models\ComForm;
use app\models\Comment;
use app\models\Post;
use app\models\User;
use Yii;
use yii\web\Controller;

class PostController extends  LogregController
{
    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $posts = Post::findOne($id);
        $user = User::find()->all();
        $comments = Comment::find()->where(['post_id' => $id])->all();
        $comform = new ComForm();
        return  $this->render('view', compact('posts', 'comments', 'comform', 'user', 'id'));
    }

    public function actionComment($id)
    {
       $model = new ComForm();
       if(Yii::$app->request->isPost)
       {
           $model->load(Yii::$app->request->post());
           if($model->sCom($id))
           {
               return $this->redirect(['post/view', 'id' => $id]);
           }
       }
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }


}