<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pelaksanaan */

$this->title = 'Create Pelaksanaan';
$this->params['breadcrumbs'][] = ['label' => 'Pelaksanaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelaksanaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
