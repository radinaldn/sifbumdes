<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;
use app\models\Usulan;
use Yii;
use app\models\Pelaksanaan;
use app\models\PelaksanaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PelaksanaanController implements the CRUD actions for Pelaksanaan model.
 */
class PelaksanaanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pelaksanaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PelaksanaanSearch();


        $query = Pelaksanaan::find()->where(['id_kategori' => Yii::$app->user->identity->id_kategori])->orderBy(['id_pelaksanaan'=>SORT_DESC]);
        //$query = Usulan::find()->all();
        //$query = Usulan::find()->joinWith('tbPelaksanaan')->all();


        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);


        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Pelaksanaan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pelaksanaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Pelaksanaan();

        $data = Yii::$app->request->post();
        $model->bukti = UploadedFile::getInstance($model, 'bukti');

        if ($model->bukti != NULL) $data['Pelaksanaan']['bukti'] = $model->bukti;
        if ($model->bukti == NULL) $data['Pelaksanaan']['bukti'] = null;

        $model->id_kategori = Yii::$app->user->identity->id_kategori;

        if ($model->load($data) && $model->save()) {

            if ($model->bukti!=NULL){
                $model->bukti->saveAs(Yii::$app->basePath.'/web/files/images/'. $model->bukti->baseName. '.' . $model->bukti->extension);
            }

            $usulan = Usulan::findOne($model->id_pelaksanaan);
            $usulan->status = "disetujui";
            $usulan->save(false);

            return $this->redirect(['view', 'id' => $model->id_pelaksanaan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pelaksanaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pelaksanaan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pelaksanaan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGaleriBukti(){
        // action galeri justifikasi

        $model = Pelaksanaan::find()
            ->orderBy(["id_pelaksanaan" => SORT_DESC])
            ->all();

        return $this->render('galeri-bukti', [
            'model' => $model,
            ]);
    }

    /**
     * Finds the Pelaksanaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pelaksanaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pelaksanaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
