<?php
/**
 * Created by PhpStorm.
 * User: radinaldn
 * Date: 07/05/18
 * Time: 23:27
 */

use app\assets\CustomAsset;
use yii\helpers\Html;

CustomAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Yii::$app->getHomeUrl() ?>/custom/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= Yii::$app->getHomeUrl() ?>/custom/assets/img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::$app->getHomeUrl() ?>custom/plugins/images/favicon.png">
    <link href="<?= Yii::$app->getHomeUrl() ?>/custom/assets/css/bootstrap.min.css"  rel="stylesheet">
    <link href="<?= Yii::$app->getHomeUrl() ?>/custom/assets/css/animate.min.css"  rel="stylesheet">
    <link href="<?= Yii::$app->getHomeUrl() ?>/custom/assets/css/paper-dashboard.css"  rel="stylesheet">
    <link href="<?= Yii::$app->getHomeUrl() ?>/custom/assets/css/demo.css"  rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"  rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,300"  rel="stylesheet">
    <link href="<?= Yii::$app->getHomeUrl() ?>/custom/assets/css/themify-icons.css"  rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="content">
<div class="wrapper">
    <div class="jumbotron">

        <div class="content">
                <div class="container-fluid">


                    <?= $content; ?>

                </div>


                </div>
            </div>

</div>
</div>
</body>
</html>
</script><script src="<?= Yii::$app->getHomeUrl() ?>/assets/152788ca/jquery.js"></script>
<script src="<?= Yii::$app->getHomeUrl() ?>/assets/e9d051cf/yii.js"></script>
<script src="<?= Yii::$app->getHomeUrl() ?>/custom/assets/js/jquery-1.10.2.js"></script>
<script src="<?= Yii::$app->getHomeUrl() ?>/custom/assets/js/bootstrap.min.js"></script>
<script src="<?= Yii::$app->getHomeUrl() ?>/custom/assets/js/bootstrap-checkbox-radio.js"></script>
<script src="<?= Yii::$app->getHomeUrl() ?>/custom/assets/js/chartist.min.js"></script>
<script src="<?= Yii::$app->getHomeUrl() ?>/custom/assets/js/bootstrap-notify.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="<?= Yii::$app->getHomeUrl() ?>/custom/assets/js/paper-dashboard.js"></script>
<script src="<?= Yii::$app->getHomeUrl() ?>/custom/assets/js/demo.js"></script></body>
</html>
<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'ti-face-smile',
            message: "Selamat datang di <b><?= Yii::$app->name ?></b> - Silahkan login menggunakan NIP dan Password."

        },{
            type: 'success',
            timer: 4000
        });

    });
</script>
<?php $this->endPage() ?>
