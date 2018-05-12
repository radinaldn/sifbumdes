<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kec */

$this->title = $model->id_kec;
$this->params['breadcrumbs'][] = ['label' => 'Kecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kec-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kec], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kec], [
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
            'id_kec',
            'nama',
            'id_kabkota',
        ],
    ]) ?>

</div>
