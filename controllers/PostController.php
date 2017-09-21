<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 21.09.2017
 * Time: 21:05
 */

namespace app\controllers;


use app\models\Post;
use Yii;
use yii\web\Controller;

class PostController extends  Controller
{
    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $posts = Post::findOne($id);
        return  $this->render('view', compact('posts'));
    }

}