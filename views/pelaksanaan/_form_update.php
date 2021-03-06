<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usulan;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Pelaksanaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelaksanaan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>



    <?= $form->field($model, 'bukti')->widget(FileInput::className(),[
            'options'=>['accept'=>'image/*'],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
