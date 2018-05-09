<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kategori;
use app\models\Keldesa;


/* @var $this yii\web\View */
/* @var $model app\models\Usulan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usulan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'id_kategori')->textInput() ?>

    <?= $form->field($model, 'id_kategori')->dropDownList(
            ArrayHelper::map(Kategori::find()
                ->where(['not in','id_kategori','-1'])
                ->all(), 'id_kategori', 'nama'),
            ['prompt'=>'Pilih kategori']
    ) ?>

    <?= $form->field($model, 'urusan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indikator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_keldesa')->dropDownList(
        ArrayHelper::map(Keldesa::find()
            ->all(), 'id_keldesa', 'nama'),
        ['prompt'=>'Pilih kelurahan/desa']
    ) ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kebutuhan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sumber')->textInput(['maxlength' => true]) ?>

    <?php // echo $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
