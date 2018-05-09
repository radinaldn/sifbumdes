<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Keldesa */

$this->title = 'Create Keldesa';
$this->params['breadcrumbs'][] = ['label' => 'Keldesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keldesa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
