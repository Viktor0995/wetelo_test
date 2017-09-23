<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\User;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?= \yii\helpers\Url::toRoute(['site/index'])?>">My_site</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="<?= \yii\helpers\Url::toRoute(['site/index'])?>">Home</a></li>
                        </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <?php  if(Yii::$app->user->isGuest): ?>
                                    <li><a href="<?= \yii\helpers\Url::toRoute(['logreg/login'])?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                    <li><a href="<?= \yii\helpers\Url::toRoute(['logreg/signup'])?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <?php  else:?>
                                    <?= Html::beginForm(['logreg/logout'], 'post')
                                    . Html::submitButton(
                                        'Logout('. Yii::$app->user->identity->username .')',
                                        ['class' => 'btn btn-danger navbar-btn']
                                    )
                                    .Html::endForm()?>
                                <?php  endif;?>
                            </ul>

                    </div>
                </nav>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="upmarg">
        <div class="container">
            <div class="col-md-9">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <div class="content">
                    <?= $content ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="category">
                        <h5>Category</h5>
                        <ul class="accordion">
                            <p><?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?></p>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
