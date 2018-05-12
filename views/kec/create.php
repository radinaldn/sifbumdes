<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kec */

$this->title = 'Create Kec';
$this->params['breadcrumbs'][] = ['label' => 'Kecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
