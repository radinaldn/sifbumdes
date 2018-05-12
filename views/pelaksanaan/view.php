<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pelaksanaan */

$this->title = $model->id_pelaksanaan;
$this->params['breadcrumbs'][] = ['label' => 'Pelaksanaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelaksanaan-view">

    <a href="<?= Url::to(['pelaksanaan/index']) ?>"><button class="btn btn-success"><i class="ti-back-left"></i> Kembali</button></a>
    <h1>Pelaksanaan #<?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pelaksanaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pelaksanaan], [
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
            'id_pelaksanaan',
            'idPelaksanaan.urusan',
            'idPelaksanaan.tanggal',
            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Foto Bukti',
                'value' => function ($data) {
                    return Html::img(Yii::$app->getHomeUrl().'files/images/' . $data['bukti'],
                        ['width' => '300px']);
                },
            ],
        ],
    ]) ?>

</div>
