<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usulan */

$this->title = 'Update Usulan: ' . $model->id_usulan;
$this->params['breadcrumbs'][] = ['label' => 'Usulans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usulan, 'url' => ['view', 'id' => $model->id_usulan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usulan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
