<?php
use okeanos\chartist\Chartist;
use yii\helpers\Json;
use yii\web\JsExpression;
?>


    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-warning text-center">
                                <i class="ti-server"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Usulan</p>
                                <?= $total_usulan ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-reload"></i> Updated now
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
                                <i class="ti-wallet"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Pelaksanaan</p>
                                <?= $total_usulan ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-calendar"></i> Last day
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
                                <i class="ti-pulse"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Kategori</p>
                                4
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-timer"></i> In the last hour
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
                                <i class="ti-twitter-alt"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Pengguna</p>
                                45
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-reload"></i> Updated now
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

                    <h4 class="title">Users Behavior</h4>
                    <p class="category">24 Hours performance</p>
                </div>
                <div class="content">
                    <?= Chartist::widget([
                        'tagName' => 'div',
                        'data' => new JsExpression(Json::encode([
                            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
                            'series' => [
                                [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                                [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                            ]
                        ])),
                        'chartOptions' => [
                            'options' => [
                                'seriesBarDistance' => 15
                            ],
                            'responsiveOptions' => [
                                [	'screen and (max-width: 640px)',
                                    [
                                        'seriesBarDistance' => 5,
                                        'axisX' => [
                                            'labelInterpolationFnc' => new JsExpression('function (value) { return value[0]; }'),
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        'widgetOptions' => [
                            'type' => 'Bar', // Bar, Line, or Pie, i.e. the chart types supported by Chartist.js
                            'useClass' => 'chartist-chart' // optional parameter, needs to be included in the htmlOptions class string as well if set! Forces the widget to use this class name as reference point for Chartist.js instead of an id
                        ],
                        'htmlOptions' => [
                            'class' => 'chartist-chart ct-chart ct-golden-section', // ct-chart for CSS references; size of the charting area needs to be assigned as well
                            //...
                        ]
                    ]); ?>

                    <div class="footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> Usulan
                            <i class="fa fa-circle text-warning"></i> Pelaksanaan
<!--                            <i class="fa fa-circle text-warning"></i> Click Second Time-->
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
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Email Statistics</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="content">
                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                    <div class="footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> Open
                            <i class="fa fa-circle text-danger"></i> Bounce
                            <i class="fa fa-circle text-warning"></i> Unsubscribe
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="ti-timer"></i> Campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="header">
                    <h4 class="title">2015 Sales</h4>
                    <p class="category">All products including Taxes</p>
                </div>
                <div class="content">
                    <div id="chartActivity" class="ct-chart"></div>

                    <div class="footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> Tesla Model S
                            <i class="fa fa-circle text-warning"></i> BMW 5 Series
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="ti-check"></i> Data information certified
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



