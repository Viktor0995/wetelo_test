<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 21.09.2017
 * Time: 16:28
 */
use \yii\helpers\Html;
use yii\widgets\LinkPager;


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
    <h3> We don't have post that category</h3>
<?php endif;?>
