<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SIFBUMDES';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">

<div class="site-login">
    <h1 class="title">
        <img  height="50%" src="<?= Yii::$app->getHomeUrl() ?>../extensions/pdf/logo/pekanbaru_logo_100px.png" class="img-circle">
        <?= Html::encode($this->title) ?></h1>

</div>

                    <div class="content">

    <p>Silahkan login menggunakan Nip dan Password:</p>
                        <?php
                        $session = Yii::$app->session;
                        echo $user_id = $session->get('nama');
                        ?>


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

                        <div class="form-group">
                            <div class="col-md-10">

        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class'=>'form-control border-input']) ?>

        <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control border-input']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary col-md-3', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

<!--    <div class="col-lg-offset-1" style="color:#999;">-->
<!--        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>-->
<!--        To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->
<!--    </div>-->
</div>

                </div>
            </div>