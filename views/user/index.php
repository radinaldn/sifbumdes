<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><i class="ti-user"></i> <?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah User', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'authKey',
            // 'accessToken',
            // 'role',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
