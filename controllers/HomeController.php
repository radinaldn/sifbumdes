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
use app\models\Kategori;
use app\models\User;



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

        $total_usulan_admin = Usulan::find()
            ->count();

        $total_pelaksanaan = Pelaksanaan::find()
            ->where(['id_kategori'=>\Yii::$app->user->identity->id_kategori])
            ->count();

        $total_pelaksanaan_admin = Pelaksanaan::find()
            ->count();

        $total_kategori = Kategori::find()
            ->where(['not in','id_kategori','-1'])
            ->count();

        $total_user = User::find()
            ->where(['not in','id_kategori','-1'])
            ->count();

        return $this->render('index',[
            'total_usulan'=>$total_usulan,
            'total_usulan_admin'=>$total_usulan_admin,
            'total_pelaksanaan'=>$total_pelaksanaan,
            'total_pelaksanaan_admin'=>$total_pelaksanaan_admin,
            'total_kategori'=>$total_kategori,
            'total_user'=>$total_user,
        ]);
    }


}
