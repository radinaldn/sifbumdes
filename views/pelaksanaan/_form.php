<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usulan;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Pelaksanaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelaksanaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'id_pelaksanaan')->textInput() ?>

    <?= $form->field($model, 'id_pelaksanaan')->dropDownList(
        ArrayHelper::map(Usulan::find()
            ->where(['not in','status','disetujui'])
            ->all(), 'id_usulan', 'urusan'),
        ['prompt'=>'Pilih usulan']
    ) ?>

    <?= $form->field($model, 'bukti')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
