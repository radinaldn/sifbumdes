<?php

namespace app\controllers;

use Yii;
use app\models\Usulan;
use app\models\UsulanSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UsulanController implements the CRUD actions for Usulan model.
 */
class UsulanController extends Controller
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
     * Lists all Usulan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsulanSearch();


        $query = Usulan::find()->where(['id_kategori' => Yii::$app->user->identity->id_kategori])->orderBy(['id_usulan'=>SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('index', [
           // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usulan model.
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
     * Creates a new Usulan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usulan();

        $data = Yii::$app->request->post();
        $model->justifikasi = UploadedFile::getInstance($model, 'justifikasi');
        $model->renja = UploadedFile::getInstance($model, 'renja');

        if ($model->justifikasi != NULL) $data['Usulan']['justifikasi'] = $model->justifikasi;
        if ($model->justifikasi == NULL) $data['Usulan']['justifikasi'] = null;

        if ($model->renja!= NULL) $data['Usulan']['renja'] = $model->renja;
        if ($model->renja== NULL) $data['Usulan']['renja'] = null;

        $model->status = "belum disetujui";

        if (Yii::$app->user->identity->id_kategori > 0) {
            $model->id_kategori = Yii::$app->user->identity->id_kategori;
        }

        if ($model->load($data) && $model->save()) {
            if ($model->justifikasi!=NULL){
                $model->justifikasi->saveAs(Yii::$app->basePath.'/web/files/justifikasi/'. $model->justifikasi->baseName. '.' . $model->justifikasi->extension);
            }

            if ($model->renja!=NULL){
                $model->renja->saveAs(Yii::$app->basePath.'/web/files/renja/'. $model->renja->baseName. '.' . $model->renja->extension);
            }


            return $this->redirect(['view', 'id' => $model->id_usulan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionAdmin(){

    }

    /**
     * Updates an existing Usulan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_usulan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usulan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usulan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usulan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usulan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
