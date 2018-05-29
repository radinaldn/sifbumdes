<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PelaksanaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelaksanaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelaksanaan-index">

    <h1><i class="ti-view-list"></i> <?= Html::encode($this->title) ?></h1>
    <form action="cetak" method="get">
        <div class="col-md-3"><input type="date" name="dari" class="form-control"></div>
        <div class="col-md-1"><p>To</p></div>
        <div class="col-md-3">
            <input type="date" name="ke" class="form-control">
        </div>

        <button class="btn btn-success" type="submit"><i class="ti-printer"></i> Cetak</button>
    </form>
    <div class="clearfix"></div>
    <br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pelaksanaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?=DataTables::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_pelaksanaan',
//            'bukti',
            'idPelaksanaan.urusan',
            'idPelaksanaan.tanggal',
            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Foto Bukti',
                'value' => function ($data) {
                    return Html::img(Yii::$app->getHomeUrl().'files/images/' . $data['bukti'],
                        ['width' => '60px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
