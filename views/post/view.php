<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 21.09.2017
 * Time: 21:09
 */


use app\models\User;
use \yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
            <div class="publication">
                <h3><?= $posts->title?></h3>
                <p><?= $posts->content?></p>
                <p>Publication day: <?= $posts->pub_date?></p>
                <p class="pict">
                    <?= Html::img("@web/uploads/{$posts->image}", ['alt' => $posts->title]) ?>
                </p>
            </div>

<?php if(!(Yii::$app->user->isGuest)):?>
    <div class="publication">
    <h3>Comments:</h3>
    <?php $form = ActiveForm::begin(['action' => ['comment', 'id'=>$posts->id]])?>

         <?= $form->field($comform, 'comment')->textarea(['placeholder' => 'Add your comment'])->label(false)?>

    <div class="form-group">
         <?= Html::submitButton('Add comment', ['class' =>  'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end();?>
    </div>
<?php endif;?>
<?php if(!empty($comments)):?>
    <?php foreach ($comments as $com):?>
        <div class="publication">
            <p>Author:<?= User::find()->where(['username' => $com->user_id])->one()?></p>
            <p><?= $com->content?></p>
            <p>Publication day: <?= $com->date_created?></p>
        </div>
    <?php endforeach;?>

<?php endif;?>



