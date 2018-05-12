<?php
use yii\helpers\Html;


$this->title = "Galeri Renja";
?>

<div class="row">
    <div class="col-md-12">
    <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php
    foreach ($model as $data) {
    ?>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title"><?= $data->urusan; ?></h4>
                    <p class="category"><?= $data->tanggal; ?></p>
                </div>
                <div class="content">
                    <a target="_blank" href="<?= Yii::$app->getHomeUrl()?>/files/renja/<?= $data->renja ?>" title="Unduh file renja <?= $data->urusan ?>"><img height="300" src="<?= Yii::$app->getHomeUrl()?>/files/images/files_icon.png"></a>

                    <div class="footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="ti-timer"></i> Campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>