<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SpesialisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spesialis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body">
<div class="spesialis-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Spesialis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis',
            // trick buat memanipulasi data
            [
                'attribute'=>'nama_spesialis',
                'format'=>'raw',
                'value'=>function($models){
                    // // ini sama seperti if condition. if(nama_spesialis == 'jantung') then 'jantung == penyakit jantung...'
                    // return $models->nama_spesialis=='jantung'?'penyakit jantung...':$models->nama_spesialis;

                    //tes ke 2
                    if($models->nama_spesialis=='jantung'){
                        $name= 'sakit '.$models->nama_spesialis.' bro?';
                    } else {
                        $name=$models->nama_spesialis;
                    }
                    return $name;
                }
            ],
            'nama_spesialis',
            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>

