<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use fedemotta\datatables\DataTables;
use app\models\Pelaksanaan;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PelaksanaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Master Pelaksanaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelaksanaan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php

    $i=1;
    foreach ($kategoris as $kategori) {

    $query = Pelaksanaan::find()->where(['id_kategori' => $i])->orderBy(['id_pelaksanaan'=>SORT_DESC]);

    $dataProvider = new ActiveDataProvider([
        'query' => $query
    ]);
    ?>

    <div class="card">

        <div class="header">
    <p>

            <h4 class="title">Pelaksanaan <?= $kategori->nama ?></h4>
    </p>
        </div>
        <div class="content table-responsive">
<?php Pjax::begin(); ?>    <?=DataTables::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_pelaksanaan',
//            'bukti',
            'idPelaksanaan.urusan',
            'idPelaksanaan.tanggal',
            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Foto Bukti',
                'value' => function ($data) {
                    return Html::img(Yii::$app->getHomeUrl().'files/images/' . $data['bukti'],
                        ['width' => '60px']);
                },
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
]);

// incremeent id_kategori
$i++;?>

        </div>

    </div>
        <?php Pjax::end(); ?>
    <?php } ?></div>
