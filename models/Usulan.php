<?php

namespace app\models;

use Yii;
use app\models\Kec;

/**
 * This is the model class for table "tb_usulan".
 *
 * @property integer $id_usulan
 * @property integer $id_kategori
 * @property string $urusan
 * @property string $indikator
 * @property integer $id_keldesa
 * @property string $target
 * @property string $kebutuhan
 * @property string $sumber
 * @property string $justifikasi
 * @property string $renja
 * @property string $status
 * @property string $tanggal
 *
 * @property TbPelaksanaan $tbPelaksanaan
 * @property TbKategori $idKategori
 * @property TbKeldesa $idKeldesa
 */
class Usulan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_usulan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kategori', 'urusan', 'indikator', 'id_keldesa', 'target', 'kebutuhan', 'sumber', 'status', 'tanggal'], 'required'],
            [['id_kategori', 'id_keldesa'], 'integer'],
            [['tanggal'], 'safe'],
            [['urusan', 'indikator', 'status'], 'string', 'max' => 255],
            [['target', 'kebutuhan'], 'string', 'max' => 100],
            [['sumber'], 'string', 'max' => 20],
            [['justifikasi','renja'], 'file','extensions' => 'docx, pdf, txt, odt', 'maxFiles' => 1, 'skipOnEmpty' => true, 'on' => 'update-photo-upload'],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['id_kategori' => 'id_kategori']],
            [['id_keldesa'], 'exist', 'skipOnError' => true, 'targetClass' => Keldesa::className(), 'targetAttribute' => ['id_keldesa' => 'id_keldesa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usulan' => 'Id Usulan',
            'id_kategori' => 'Id Kategori',
            'urusan' => 'Urusan',
            'indikator' => 'Indikator',
            'id_keldesa' => 'Id Keldesa',
            'target' => 'Target',
            'kebutuhan' => 'Kebutuhan',
            'sumber' => 'Sumber',
            'justifikasi' => 'Justifikasi',
            'renja' => 'Renja',
            'status' => 'Status',
            'tanggal' => 'Tanggal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbPelaksanaan()
    {
        return $this->hasOne(Pelaksanaan::className(), ['id_pelaksanaan' => 'id_usulan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKategori()
    {
        return $this->hasOne(Kategori::className(), ['id_kategori' => 'id_kategori']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKeldesa()
    {
        return $this->hasOne(Keldesa::className(), ['id_keldesa' => 'id_keldesa']);
    }

    public function getUsulanPerBulan(){
        return $posts = Yii::$app->db->createCommand('SELECT 
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
    }


}
