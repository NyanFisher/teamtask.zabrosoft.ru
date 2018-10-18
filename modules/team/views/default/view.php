<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-1 text-left">
                <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="btn btn-default">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </a>
            </div>
            <div class="col-md-11">
                <h5 class="text-center"><?= $title ?></h5>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <?php if ($is_new): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Команда создана</strong> Команда <?= $title ?> успешно создана.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>