<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Usulan */

$this->title = $model->urusan;
$this->params['breadcrumbs'][] = ['label' => 'Usulan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usulan-view">

    <a href="<?php
    if (Yii::$app->user->identity->id_kategori == '-1') {
        echo Url::to(['usulan/admin']);
    } else {
        echo Url::to(['usulan/index']);
    }
    ?>"><button class="btn btn-success"><i class="ti-back-left"></i> Kembali</button></a>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_usulan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_usulan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_usulan',
            'id_kategori',
            'urusan',
            'indikator',
            'idKeldesa.nama',
            'target',
            'kebutuhan',
            'sumber',
            //'justifikasi',
            [
                'format'=>'html',
                'attribute'=>'text',
                'label'=>'Justifikasi',
                'value'=>function($data){

                            return Html::decode(Html::decode('<a title="unduh file justifikasi" href="'.Yii::$app->getHomeUrl().'files/justifikasi/'.$data->justifikasi.'"><span class="label label-info"><i class="ti-download"></i> '.$data->justifikasi.'</span></a>'));
                },
            ],
            //'renja',
            [
                'format'=>'html',
                'attribute'=>'text',
                'label'=>'Renja',
                'value'=>function($data){

                    return Html::decode(Html::decode('<a title="unduh file renja" href="'.Yii::$app->getHomeUrl().'files/renja/'.$data->renja.'"><span class="label label-info"><i class="ti-download"></i> '.$data->renja.'</span></a>'));
                },
            ],
            [
                'format'=>'html',
                'attribute'=>'text',
                'label'=>'Status',
                'value'=>function($data){
                    if($data->status == "disetujui"){
                        return Html::decode(Html::decode('<a title="Lihat pelaksanaan" href="'.Url::to(['pelaksanaan/view?id=']).$data->id_usulan.'"><span class="label label-success"><i class="ti-check"></i> '.$data->status.'</span></a>'));
                    } else if ($data->status == 'belum disetujui'){
                        return Html::decode(Html::decode('<span class="label label-warning"><i class="ti-close"></i> '.$data->status.'</span>
                                                                  <a href="'.Url::to(['pelaksanaan/create']).'"><span class="label label-info"><i class="ti-pencil"></i> Buat pelaksanaan</span></a>
                                                                   '))
                            ;
                    }
                },
            ],
            'tanggal',
        ],
    ]) ?>

</div>
