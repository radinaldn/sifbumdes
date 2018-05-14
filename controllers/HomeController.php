<?php
/**
 * Created by PhpStorm.
 * User: radinaldn
 * Date: 07/05/18
 * Time: 21:49
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Usulan;
use app\models\Pelaksanaan;



class HomeController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $total_usulan = Usulan::find()
            ->where(['id_kategori'=>\Yii::$app->user->identity->id_kategori])
            ->count();

        $total_pelaksanaan = Pelaksanaan::find()
            ->where(['id_kategori'=>\Yii::$app->user->identity->id_kategori])
            ->count();

        $usulan_perbulans  = Yii::$app->db->createCommand('SELECT 
	COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-01-01\' AND \'2018-01-31\') THEN 1 END) AS jan, 
	COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-02-01\' AND \'2018-02-31\') THEN 1 END) AS feb, 
	COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-03-01\' AND \'2018-03-31\') THEN 1 END) AS mar,
	COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-04-01\' AND \'2018-04-31\') THEN 1 END) AS apr,
    COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-05-01\' AND \'2018-05-31\') THEN 1 END) AS mei,
    COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-06-01\' AND \'2018-06-31\') THEN 1 END) AS jun,
    COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-07-01\' AND \'2018-07-31\') THEN 1 END) AS jul,
    COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-08-01\' AND \'2018-08-31\') THEN 1 END) AS agu,
    COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-09-01\' AND \'2018-09-31\') THEN 1 END) AS sep,
    COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-10-01\' AND \'2018-10-31\') THEN 1 END) AS okt,
    COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-11-01\' AND \'2018-11-31\') THEN 1 END) AS nov,
    COUNT(CASE WHEN (`tanggal` BETWEEN \'2018-12-01\' AND \'2018-12-31\') THEN 1 END) AS des
FROM `tb_usulan`')
        ->queryAll();


        return $this->render('index',[
            'total_usulan'=>$total_usulan,
            'total_pelaksanaan'=>$total_pelaksanaan,
            'usulan_perbulans'=>$usulan_perbulans,
        ]);
    }


}
