<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KeldesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelurahan/Desa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keldesa-index">

    <h1><i class="ti-map"></i> <?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Kelurahan/Desa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_keldesa',
            'nama',
            'idKec.nama',
            'idKec.idKabkota.nama',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
