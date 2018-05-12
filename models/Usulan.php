<?php

namespace app\models;

use Yii;

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
            [['id_kategori', 'urusan', 'indikator', 'id_keldesa', 'target', 'kebutuhan', 'sumber', 'justifikasi', 'renja', 'status', 'tanggal'], 'required'],
            [['id_kategori', 'id_keldesa'], 'integer'],
            [['tanggal'], 'safe'],
            [['urusan', 'indikator', 'justifikasi', 'renja', 'status'], 'string', 'max' => 255],
            [['target', 'kebutuhan'], 'string', 'max' => 100],
            [['sumber'], 'string', 'max' => 20],
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
}
