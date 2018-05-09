<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spesialis */

$this->title = 'Update Spesialis: ' . $model->id_spesialis;
$this->params['breadcrumbs'][] = ['label' => 'Spesialis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis, 'url' => ['view', 'id' => $model->id_spesialis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spesialis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
