<?php
/**
 * Created by PhpStorm.
 * User: radinaldn
 * Date: 14/05/18
 * Time: 11:11
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use fedemotta\datatables\DataTables;
use yii\helpers\Url;
use app\models\Usulan;
use yii\data\ActiveDataProvider;

$this->title = 'Data Master Usulan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usulan-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php

    $i=1;
    foreach ($kategoris as $kategori) {

        $query = Usulan::find()->where(['id_kategori' => $i])->orderBy(['id_usulan'=>SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
    ?>
    <div class="card">

        <div class="header">
    <p>
        <?= Html::a('Ajukan Usulan', ['create'], ['class' => 'btn btn-success']) ?>
        <h4 class="title">Usulan <?= $kategori->nama ?></h4>
    </p>
        </div>

        <div class="content table-responsive">
    <?php Pjax::begin(); ?>    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_usulan',
            'urusan',
            'idKategori.nama',
//            'indikator',
            'idKeldesa.nama',
            // 'target',
            // 'kebutuhan',
            // 'sumber',
            // 'justifikasi',
            // 'renja',
            'tanggal',
            [
                'format'=>'html',
                'attribute'=>'text',
                'label'=>'Status',
                'value'=>function($data){
                    if($data->status == "disetujui"){
                        return Html::decode(Html::decode('<a title="Lihat pelaksanaan" href="'.Url::to(['pelaksanaan/view?id=']).$data->id_usulan.'"><span class="label label-success"><i class="ti-check"></i> '.$data->status.'</span></a>'));
                    } else if ($data->status == 'belum disetujui'){
                        return Html::decode(Html::decode('<span class="label label-warning"><i class="ti-close"></i> '.$data->status.'</span>'));
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    // incremeent id_kategori
    $i++;?>

        </div>

    </div>
    <?php Pjax::end(); ?>
    <?php } ?></div>
