<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-1 text-left">
                <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="btn btn-default">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </a>
            </div>
            <div class="col-md-11">
                <h5 class="text-center">Новая команда</h5>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($form_data, 'title')->textInput() ?>
        <?= $form->field($form_data, 'description')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen',
                ],
            ],
        ])?>
            <div class="text-right">
                <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>