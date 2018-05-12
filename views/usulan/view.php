<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Usulan */

$this->title = $model->id_usulan;
$this->params['breadcrumbs'][] = ['label' => 'Usulans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usulan-view">

    <a href="<?= Url::to(['usulan/index']) ?>"><button class="btn btn-success"><i class="ti-back-left"></i> Kembali</button></a>
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
            'id_keldesa',
            'target',
            'kebutuhan',
            'sumber',
            'justifikasi',
            'renja',
            'status',
            'tanggal',
        ],
    ]) ?>

</div>
