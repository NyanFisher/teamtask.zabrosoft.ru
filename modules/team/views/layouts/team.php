<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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

<div class="row">
    <div class="col-md-2 padding-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h5 class="text-center"><?= \app\models\User::findOne(Yii::$app->user->getId())->username ?></h5>
            </div>
            <div class="panel-body padding-0">
                <div class="list-group">
                    <a href="<?= Url::to(['new']) ?>" class="list-group-item">Создать команду</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 padding-1">
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
