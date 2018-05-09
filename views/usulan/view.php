<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usulan */

$this->title = $model->id_usulan;
$this->params['breadcrumbs'][] = ['label' => 'Usulans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usulan-view">

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
            'idKategori.nama',
            'urusan',
            'indikator',
            'idKeldesa.nama',
            'target',
            'kebutuhan',
            'sumber',
            'status',
            'tanggal',
        ],
    ]) ?>

</div>
