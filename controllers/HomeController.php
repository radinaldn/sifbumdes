<?php
/**
 * Created by PhpStorm.
 * User: radinaldn
 * Date: 07/05/18
 * Time: 21:49
 */

namespace app\controllers;

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

        return $this->render('index',[
            'total_usulan'=>$total_usulan,
            'total_pelaksanaan'=>$total_pelaksanaan,
        ]);
    }


}
