<?php

namespace app\controllers;

use yii\db\Query;
use app\models\Kabkota;
use Yii;
use app\models\Usulan;
use app\models\UsulanSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;
use app\models\Kec;
use kartik\mpdf\Pdf;
use app\models\Kategori;

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

        $kategoris = Kategori::find()->where(["not in", "id_kategori", [-1]])->all();

        return $this->render('admin', [
            // 'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
            'kategoris' => $kategoris,
        ]);
    }

    public function actionId_kec() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kabkota_id = $parents[0];
                $out = self::getKecList($kabkota_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }


    public function actionId_keldesa() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
                $data = self::getProdList($cat_id, $subcat_id);
                /**
                 * the getProdList function will query the database based on the
                 * cat_id and sub_cat_id and return an array like below:
                 *  [
                 *      'out'=>[
                 *          ['id'=>'<prod-id-1>', 'name'=>'<prod-name1>'],
                 *          ['id'=>'<prod_id_2>', 'name'=>'<prod-name2>']
                 *       ],
                 *       'selected'=>'<prod-id-1>'
                 *  ]
                 */

                echo Json::encode(['output'=>$data['out'], 'selected'=>$data['selected']]);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function getKecList($id_kabkota){
        return Kec::find()->where(['id_kabkota'=>$id_kabkota])->all();
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

        $data = Yii::$app->request->post();
        $model->justifikasi = UploadedFile::getInstance($model, 'justifikasi');
        $model->renja = UploadedFile::getInstance($model, 'renja');

        if ($model->justifikasi != NULL) $data['Usulan']['justifikasi'] = $model->justifikasi;
        //if ($model->justifikasi == NULL) $data['Usulan']['justifikasi'] = null;

        if ($model->renja!= NULL) $data['Usulan']['renja'] = $model->renja;
        //if ($model->renja== NULL) $data['Usulan']['renja'] = null;



        if ($model->load($data) && $model->save()) {
            if ($model->justifikasi!=NULL){
                $model->justifikasi->saveAs(Yii::$app->basePath.'/web/files/justifikasi/'. $model->justifikasi->baseName. '.' . $model->justifikasi->extension);
            }

            if ($model->renja!=NULL){
                $model->renja->saveAs(Yii::$app->basePath.'/web/files/renja/'. $model->renja->baseName. '.' . $model->renja->extension);
            }

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

    public function actionGaleriRenja(){
        // action galeri justifikasi

        if (Yii::$app->user->identity->id_kategori > 0){
            $model = Usulan::find()
                ->where(['id_kategori'=>Yii::$app->user->identity->id_kategori])
                ->orderBy(["id_usulan" => SORT_DESC])
                ->all();
        } else if (Yii::$app->user->identity->id_kategori == -1){
            $model = Usulan::find()
                ->orderBy(["id_usulan" => SORT_DESC])
                ->all();
        }

        return $this->render('galeri-renja', [
            'model' => $model,
        ]);
    }

    public function actionGaleriJustifikasi(){
        // action galeri justifikasi

        if (Yii::$app->user->identity->id_kategori > 0){
            $model = Usulan::find()
                ->where(['id_kategori'=>Yii::$app->user->identity->id_kategori])
                ->orderBy(["id_usulan" => SORT_DESC])
                ->all();
        } else if (Yii::$app->user->identity->id_kategori == -1){
            $model = Usulan::find()
                ->orderBy(["id_usulan" => SORT_DESC])
                ->all();
        }

        return $this->render('galeri-justifikasi', [
            'model' => $model,
        ]);
    }



    public function actionCetak($dari, $ke){

//        $model= Usulan::find()
//            ->joinWith('idKeldesa', false, 'INNER JOIN')
//            ->where(['id_kategori' => Yii::$app->user->identity->id_kategori])
//            ->orderBy(['id_usulan'=>SORT_DESC])
//            ->all();

        $query = new Query;
        $query	->select(['tb_usulan.urusan', 'tb_usulan.target', 'tb_usulan.kebutuhan', 'tb_usulan.sumber','tb_usulan.tanggal', 'tb_usulan.status', 'tb_usulan.id_keldesa AS id_keldesa', 'tb_keldesa.nama as nama_keldesa'])
            ->from('tb_usulan')
            ->innerJoin('tb_keldesa', 'tb_keldesa.id_keldesa= tb_usulan.id_keldesa')
            ->andWhere(['tb_usulan.id_kategori' => Yii::$app->user->identity->id_kategori, 'tb_usulan.status'=>'disetujui', ])
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
