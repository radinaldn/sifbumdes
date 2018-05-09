<?php
/**
 * Created by PhpStorm.
 * User: radinaldn
 * Date: 07/05/18
 * Time: 21:49
 */

namespace app\controllers;

use yii\web\Controller;


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
        return $this->render('index');
    }


}
