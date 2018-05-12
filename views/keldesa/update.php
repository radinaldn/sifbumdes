<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Keldesa */

$this->title = 'Update Keldesa: ' . $model->id_keldesa;
$this->params['breadcrumbs'][] = ['label' => 'Keldesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_keldesa, 'url' => ['view', 'id' => $model->id_keldesa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keldesa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
