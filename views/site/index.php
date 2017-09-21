<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>

    <?php if(!empty($models)): ?>
        <?php foreach ($models as $show):?>
            <?php if($show->status !== 0): ?>
                <div class="publication">
                    <h3><?= $show->title?></h3>
                    <p>Publication day: <?= $show->pub_date?></p>
                </div>
            <?php endif;?>
        <?php endforeach;?>
        <div class="mypager">
           <? echo LinkPager::widget(['pagination' => $pages,]);?>
        </div>
    <?php else: ?>
        <h3> We don't have post now</h3>
    <?php endif;?>


