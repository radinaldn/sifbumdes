<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use fedemotta\datatables\DataTables;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsulanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usulan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usulan-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?= Html::a('Ajukan Usulan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
    ]); ?>
<?php Pjax::end(); ?></div>
