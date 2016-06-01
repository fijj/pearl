<? foreach ($new as $msg): ?>
    <div class="col-md-10 col-md-offset-<?= (Yii::$app->user->identity->managerId == $msg->userId) ? '0' : '2' ?>">
        <div class="row msg-container">
            <div class="msg-text new">
                <div class="row">
                    <div class="msg-timestamp col-md-12">
                        <?= $msg->time ?>
                        <span class="label label-default pull-right"><?= (Yii::$app->user->identity->managerId == $msg->userId) ? false : $msg->managers->managerName ?></span>
                    </div>
                </div>
                <?= $msg->text ?>
            </div>
        </div>
    </div>
<? endforeach; ?>