<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\CustomAsset;
use yii\helpers\Url;

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
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    <?= Yii::$app->name ?>
                </a>
            </div>

            <?php if(Yii::$app->user->identity->id_kategori == -1) { ?>
            <ul class="nav">
                <li class="active">
                    <a href="<?= Url::to(['home/index']) ?>">
                        <i class="ti-panel"></i>
                        <p>Halaman Utama</p>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['usulan/index']) ?>">
                        <i class="ti-pencil"></i>
                        <p>Usulan</p>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['pelaksanaan/index']) ?>">
                        <i class="ti-view-list-alt"></i>
                        <p>Pelaksanaan</p>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['kategori/index']) ?>">
                        <i class="ti-text"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['pengguna/index']) ?>">
                        <i class="ti-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['usulan/galeri-renja']) ?>">
                        <i class="ti-image"></i>
                        <p>Galeri Renja</p>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['usulan/galeri-justifikasi']) ?>">
                        <i class="ti-image"></i>
                        <p>Galeri Justifikasi</p>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['pelaksanaan/galeri-bukti']) ?>">
                        <i class="ti-image"></i>
                        <p>Galeri Bukti</p>
                    </a>
                </li>
                <li>
                    <a href="kabkota">
                        <i class="ti-map"></i>
                        <p>Kabupaten/Kota</p>
                    </a>
                </li>
                <li>
                    <a href="kec">
                        <i class="ti-map"></i>
                        <p>Kecamatan</p>
                    </a>
                </li>
                <li>
                    <a href="keldesa">
                        <i class="ti-map"></i>
                        <p>Kelurahan/Desa</p>
                    </a>
                </li>
                <li>
                    <a href="site/logout">
                        <i class="ti-power-off"></i>
                        <p>Keluar</p>
                    </a>
                </li>
            </ul>
            <?php } else { ?>
                <?php if(Yii::$app->user->identity->id_kategori > 0) ?>
                            <ul class="nav">
                                <li class="active">
                                    <a href="<?= Url::to(['home/index']) ?>">
                                        <i class="ti-panel"></i>
                                        <p>Halaman Utama</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['usulan/index']) ?>">
                                        <i class="ti-pencil"></i>
                                        <p>Usulan</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['pelaksanaan/index']) ?>">
                                        <i class="ti-view-list-alt"></i>
                                        <p>Pelaksanaan</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['usulan/galeri-justifikasi']) ?>">
                                        <i class="ti-image"></i>
                                        <p>Galeri Renja</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['usulan/galeri-justifikasi']) ?>">
                                        <i class="ti-image"></i>
                                        <p>Galeri Justifikasi</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['pelaksanaan/galeri-bukti']) ?>">
                                        <i class="ti-image"></i>
                                        <p>Galeri Bukti</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['site/logout']) ?>">
                                        <i class="ti-power-off"></i>
                                        <p>Keluar</p>
                                    </a>
                                </li>
                            </ul>
            <?php } ?>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Navigasi <?= Yii::$app->user->identity->idKategori->nama ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
<!--                        <li>-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                                <i class="ti-panel"></i>-->
<!--                                <p>Stats</p>-->
<!--                            </a>-->
<!--                        </li>-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <p class="notification">5</p>
                                <p>Notifikasi</p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti-power-off"></i>
                                <p>keluar</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">

<?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Radinaldn
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    <p>&copy; radinaldn <?= date('Y') ?></p>
                </div>
            </div>
        </footer>

<?php $this->endBody() ?>
</body>
</html>
<!--<script type="text/javascript">-->
<!--    $(document).ready(function(){-->
<!---->
<!--        demo.initChartist();-->
<!---->
<!--        $.notify({-->
<!--            icon: 'ti-face-smile',-->
<!--            message: "Selamat datang <b>--><?//= Yii::$app->user->identity->nama ?>//</b> - Anda login sebagai Administrator yang dapat mengelola seluruh data."
//
//        },{
//            type: 'success',
//            timer: 4000
//        });
//
//    });
//</script>
<?php $this->endPage() ?>
