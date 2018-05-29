<?php

namespace app\controllers;

use app\models\Kategori;
use yii\db\Query;
use kartik\mpdf;
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

    public function actionCetak($dari, $ke){

//        $model= Usulan::find()
//            ->joinWith('idKeldesa', false, 'INNER JOIN')
//            ->where(['id_kategori' => Yii::$app->user->identity->id_kategori])
//            ->orderBy(['id_usulan'=>SORT_DESC])
//            ->all();

        $query = new Query;
        $query	->select(['tb_usulan.urusan', 'tb_usulan.target', 'tb_usulan.kebutuhan', 'tb_usulan.sumber','tb_usulan.tanggal', 'tb_usulan.status', 'tb_usulan.id_keldesa AS id_keldesa', 'tb_pelaksanaan.id_pelaksanaan', 'tb_keldesa.nama as nama_keldesa'])
            ->from('tb_pelaksanaan')
            ->innerJoin('tb_usulan', 'tb_usulan.id_usulan= tb_pelaksanaan.id_pelaksanaan' )
            ->innerJoin('tb_keldesa', 'tb_usulan.id_keldesa =tb_keldesa.id_keldesa')
            ->andWhere(['tb_pelaksanaan.id_kategori' => Yii::$app->user->identity->id_kategori])
            ->andWhere(['between', 'tb_usulan.tanggal', $dari, $ke ])
            ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();

//    echo "<pre>";
//    print_r($model);
//    exit();

        //get your HTML raw content without any layouts or scripts
        return $this->renderPartial('_cetak', [
            'model'=> $model,
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

    public function actionBuat($id_usulan)
    {

        $model = new Pelaksanaan();

        $data = Yii::$app->request->post();
        $model->bukti = UploadedFile::getInstance($model, 'bukti');

        if ($model->bukti != NULL) $data['Pelaksanaan']['bukti'] = $model->bukti;
        //if ($model->bukti == NULL) $data['Pelaksanaan']['bukti'] = null;

        $model->id_kategori = Yii::$app->user->identity->id_kategori;
        $model->id_pelaksanaan = $id_usulan;

        if ($model->load($data) && $model->save()) {

            if ($model->bukti!=NULL){
                $model->bukti->saveAs(Yii::$app->basePath.'/web/files/images/'. $model->bukti->baseName. '.' . $model->bukti->extension);
            }

            $usulan = Usulan::findOne($model->id_pelaksanaan);
            $usulan->status = "disetujui";
            $usulan->save(false);

            return $this->redirect(['view', 'id' => $model->id_pelaksanaan]);
        } else {
            return $this->render('buat', [
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
        $model->id_pelaksanaan = $id;

        $data = Yii::$app->request->post();
        $model->bukti = UploadedFile::getInstance($model, 'bukti');

        if ($model->bukti != NULL) $data['Pelaksanaan']['bukti'] = $model->bukti;
        //if ($model->bukti == NULL) $data['Pelaksanaan']['bukti'] = null;

        if ($model->load($data) && $model->save()) {

            if ($model->bukti!=NULL){
                $model->bukti->saveAs(Yii::$app->basePath.'/web/files/images/'. $model->bukti->baseName. '.' . $model->bukti->extension);
            }

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

        if (Yii::$app->user->identity->id_kategori > 0){
            $model = Pelaksanaan::find()
                ->where(['id_kategori'=>Yii::$app->user->identity->id_kategori])
                ->orderBy(["id_pelaksanaan" => SORT_DESC])
                ->all();
        } else if (Yii::$app->user->identity->id_kategori == -1){
            $model = Pelaksanaan::find()
                ->orderBy(["id_pelaksanaan" => SORT_DESC])
                ->all();
        }

        return $this->render('galeri-bukti', [
            'model' => $model,
        ]);
    }

    public function actionAdmin()
    {
        $searchModel = new PelaksanaanSearch();

        $kategoris = Kategori::find()->where(["not in", "id_kategori", [-1]])->all();

        return $this->render('admin', [
            //'searchModel' => $searchModel,
            'kategoris'=>$kategoris,

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
