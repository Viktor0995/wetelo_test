<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 21.09.2017
 * Time: 21:09
 */


use \yii\helpers\Html;


?>
            <div class="publication">
                <h3><?= $posts->title?></h3>
                <p><?= $posts->content?></p>
                <p>Publication day: <?= $posts->pub_date?></p>
                <p class="pict">
                    <?= Html::img("@web/uploads/{$posts->image}", ['alt' => $posts->title]) ?>
                </p>
            </div>


