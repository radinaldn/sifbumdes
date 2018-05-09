<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spesialis */

$this->title = $model->id_spesialis;
$this->params['breadcrumbs'][] = ['label' => 'Spesialis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-view">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis], [
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
            'id_spesialis',
            // trick buat memanipulasi data pada view
            [
                'attribute'=>'nama_spesialis',
                'format'=>'raw',
                'value'=> $model->nama_spesialis=='jantung'?'Sakit jantung???':$model->nama_spesialis,
            ],
            'nama_spesialis',
            'keterangan:ntext',
        ],
    ]) ?>

</div>
