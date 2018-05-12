<?php

use app\models\Keldesa;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Usulan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usulan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if (Yii::$app->user->identity->id_kategori == -1) {
        echo $form->field($model, 'id_kategori')->textInput();
    }?>

    <?= $form->field($model, 'urusan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indikator')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'id_keldesa')->dropDownList(
        ArrayHelper::map(Keldesa::find()->all(),'id_keldesa','nama'),
        ['prompt'=>'Pilih Kelurahan/Desa']
    )
    ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kebutuhan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'justifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'renja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
