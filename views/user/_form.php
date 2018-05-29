<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kategori;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'id_kategori')->dropDownList(
        ArrayHelper::map(Kategori::find()
            ->where(['not in','id_kategori','-1'])
            ->all(), 'id_kategori', 'nama'),
        ['prompt'=>'Pilih kategori']
    );
    ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
