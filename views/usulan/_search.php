<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsulanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usulan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_usulan') ?>

    <?= $form->field($model, 'id_kategori') ?>

    <?= $form->field($model, 'urusan') ?>

    <?= $form->field($model, 'indikator') ?>

    <?= $form->field($model, 'id_keldesa') ?>

    <?php // echo $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'kebutuhan') ?>

    <?php // echo $form->field($model, 'sumber') ?>

    <?php // echo $form->field($model, 'justifikasi') ?>

    <?php // echo $form->field($model, 'renja') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
