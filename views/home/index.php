
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-warning text-center">
                                <i class="ti-pencil"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Usulan</p>
                                <?php
                                if (Yii::$app->user->identity->id_kategori == '-1'){
                                    echo $total_usulan_admin;
                                } else {
                                    echo $total_usulan;
                                }
                                 ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-calendar"></i> All time
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-view-list-alt"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Pelaksanaan</p>
                                <?php
                                if (Yii::$app->user->identity->id_kategori == '-1'){
                                    echo $total_pelaksanaan_admin;
                                } else {
                                    echo $total_pelaksanaan;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-calendar"></i> All time
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-text"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Kategori</p>
                                <?= $total_kategori ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-calendar"></i> All time
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-info text-center">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Pengguna</p>
                                <?= $total_user ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-calendar"></i> All time
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class=" header">
                    <h4 class="title">Struktur Organisasi</h4>
                    <p class="category">Dinas Pemberdayaan Masyarakat dan Desa</p>
                </div>
                <div class="content">
                    <img width="100%" src="<?= Yii::$app->getHomeUrl() ?>files/images/Struktur_PMD.jpg">
                    <div class="footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="ti-reload"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="row">-->
<!--        <div class="col-md-6">-->
<!--            <div class="card">-->
<!--                <div class="header">-->
<!--                    <h4 class="title">Email Statistics</h4>-->
<!--                    <p class="category">Last Campaign Performance</p>-->
<!--                </div>-->
<!--                <div class="content">-->
<!--                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>-->
<!---->
<!--                    <div class="footer">-->
<!--                        <div class="chart-legend">-->
<!--                            <i class="fa fa-circle text-info"></i> Open-->
<!--                            <i class="fa fa-circle text-danger"></i> Bounce-->
<!--                            <i class="fa fa-circle text-warning"></i> Unsubscribe-->
<!--                        </div>-->
<!--                        <hr>-->
<!--                        <div class="stats">-->
<!--                            <i class="ti-timer"></i> Campaign sent 2 days ago-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-md-6">-->
<!--            <div class="card ">-->
<!--                <div class="header">-->
<!--                    <h4 class="title">2015 Sales</h4>-->
<!--                    <p class="category">All products including Taxes</p>-->
<!--                </div>-->
<!--                <div class="content">-->
<!--                    <div id="chartActivity" class="ct-chart"></div>-->
<!---->
<!--                    <div class="footer">-->
<!--                        <div class="chart-legend">-->
<!--                            <i class="fa fa-circle text-info"></i> Tesla Model S-->
<!--                            <i class="fa fa-circle text-warning"></i> BMW 5 Series-->
<!--                        </div>-->
<!--                        <hr>-->
<!--                        <div class="stats">-->
<!--                            <i class="ti-check"></i> Data information certified-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->



