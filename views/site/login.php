<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="<?= \yii\helpers\Url::to('signup') ?>">Регистрация</a>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
