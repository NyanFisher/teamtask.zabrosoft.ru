<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h5>Новая команда</h5>
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