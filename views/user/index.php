<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


<!--        <div class="row">-->
<!--            <div class="col-md-12">-->
<!--                <div class="card">-->
<!--                    <div class="header">-->

    <h2 class="title"><?= "Pengguna" ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    </div>

                    <div class="content">
    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nip',
            'password',
            'idKategori.nama',
            'nama',
            'jenis_kelamin',
            // 'alamat:ntext',
            // 'email:email',
            // 'hp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
                </div>
