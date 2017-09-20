<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <button>Submit</button>

    <?php ActiveForm::end(); ?>

</div>

