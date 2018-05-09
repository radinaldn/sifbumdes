<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Spesialis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spesialis-form">

    <?php $form = ActiveForm::begin(); ?>

//contoh drop down list
	<?= $form->field($model, 'nama_spesialis')->dropDownList(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_spesialis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
