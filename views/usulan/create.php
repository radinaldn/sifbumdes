<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usulan */

$this->title = 'Create Usulan';
$this->params['breadcrumbs'][] = ['label' => 'Usulans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usulan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
