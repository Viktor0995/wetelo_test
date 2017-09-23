<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 21.09.2017
 * Time: 16:23
 */

namespace app\controllers;


use app\models\Post;
use app\models\Category;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;


class CategoryController extends LogregController
{
    public function actionView($id){

        $id = Yii::$app->request->get('id');
        $query = Post::find()->where(['category_id' => $id, 'status' => 1 ]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 1]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['pub_date'=>SORT_DESC])
            ->all();

        return $this->render('view', compact('models', 'pages'));
    }

}