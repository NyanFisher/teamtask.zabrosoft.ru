<?php
use yii\helpers\Url;
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h5 class="text-center">Список команд</h5>
    </div>
    <div class="panel-body">
        <div class="list-group">
            <?php foreach ($teams as $team): ?>
            <a href="<?= Url::to(['view', 'id' => $team->id]) ?>" class="list-group-item">
                <?= $team->title ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>