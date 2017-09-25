<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 24.09.2017
 * Time: 18:57
 */


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php if(!empty($comments)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>user_id</td>
                            <td>content</td>
                            <td>action</td>
                        </tr>
                    </thead>
                    <body>
                    <?php foreach ($comments as $comment):?>
                        <tr>
                            <td><?= $comment->id?></td>
                            <td><?= $comment->user_id?></td>
                            <td><?= $comment->content?></td>
                            <td>
                                <?php if($comment->status == 1):?>
                                    <a class="btn btn-warning" href="<?= url::toRoute(['comment/disallow', 'id' => $comment->id]);?>">Disallow</a>
                                <?php else:?>
                                    <a class="btn btn-success" href="<?= url::toRoute(['comment/allow', 'id' => $comment->id]);?>">Allow</a>
                                <?php endif;?>
                                <a class="btn btn-danger" href="<?= url::toRoute(['comment/delete', 'id' => $comment->id]);?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>

                    </body>
                </table>
        <?php endif;?>
    <?php ?>
</div>
