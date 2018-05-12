<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kabkota */

$this->title = $model->id_kabkota;
$this->params['breadcrumbs'][] = ['label' => 'Kabkotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabkota-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kabkota], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kabkota], [
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
            'id_kabkota',
            'nama',
            'lat',
            'lng',
        ],
    ]) ?>

</div>
