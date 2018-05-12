<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kabkota */

$this->title = 'Update Kabkota: ' . $model->id_kabkota;
$this->params['breadcrumbs'][] = ['label' => 'Kabkotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kabkota, 'url' => ['view', 'id' => $model->id_kabkota]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kabkota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
