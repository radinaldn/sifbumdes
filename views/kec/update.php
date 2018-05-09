<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kec */

$this->title = 'Update Kec: ' . $model->id_kec;
$this->params['breadcrumbs'][] = ['label' => 'Kecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kec, 'url' => ['view', 'id' => $model->id_kec]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kec-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
