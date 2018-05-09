<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pelaksanaan */

$this->title = 'Update Pelaksanaan: ' . $model->id_pelaksanaan;
$this->params['breadcrumbs'][] = ['label' => 'Pelaksanaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelaksanaan, 'url' => ['view', 'id' => $model->id_pelaksanaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelaksanaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
