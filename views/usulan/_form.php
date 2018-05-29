<?php

use app\models\Keldesa;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\file\FileInput;
use kartik\depdrop\DepDrop;
use app\models\Kabkota;
use yii\helpers\Url;
use app\models\Kategori;



/* @var $this yii\web\View */
/* @var $model app\models\Usulan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usulan-form">

    <?php $kabkotalist = Kabkota::find()->all();
    $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?php
    if (Yii::$app->user->identity->id_kategori == -1) {
        echo $form->field($model, 'id_kategori')->dropDownList(
        ArrayHelper::map(Kategori::find()
            ->where(['not in','id_kategori','-1'])
            ->all(), 'id_kategori', 'nama'),
        ['prompt'=>'Pilih kategori']
    );
    }?>

    <?= $form->field($model, 'urusan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indikator')->textInput(['maxlength' => true]) ?>

        <?php
//        echo
//        $form->field($model, 'id_kabkota')->dropDownList(
//            ArrayHelper::map(Kabkota::find()->all(),'id_kabkota','nama'),
//            ['id'=>'id_kabkota'])
        ?>


    <?php
    //echo
//    $form->field($model, 'id_kec')->widget(DepDrop::classname(), [
//        'options'=>['id_kec'=>'kec-id'],
//        'pluginOptions'=>[
//            'depends'=>['id_kabkota'],
//            'placeholder'=>'Select...',
//            'url'=>Url::to(['/usulan/id_kec'])
//        ]
//    ]);
    ?>

    <?php //echo
//    $form->field($model, 'id_keldesa')->widget(DepDrop::classname(), [
//        'pluginOptions'=>[
//            'depends'=>['kabkota-id', 'kec-id'],
//            'placeholder'=>'Select...',
//            'url'=>Url::to(['/usulan/id_keldesa'])
//        ]
//    ]);
    ?>

    <?php echo
    $form->field($model, 'id_keldesa')->dropDownList(
        ArrayHelper::map(Keldesa::find()->all(),'id_keldesa','nama'),
        ['prompt'=>'Pilih Kelurahan/Desa']
    )
    ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kebutuhan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'justifikasi')->widget(FileInput::className(),[
    ]) ?>

    <?= $form->field($model, 'renja')->widget(FileInput::className(),[
    ]) ?>

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
