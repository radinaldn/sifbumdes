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
 * @property string $status
 * @property string $tanggal
 *
 * @property Pelaksanaan[] $Pelaksanaans
 * @property Kategori $idKategori
 * @property Keldesa $idKeldesa
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
            'id_kategori' => 'Kategori',
            'urusan' => 'Urusan',
            'indikator' => 'Indikator',
            'id_keldesa' => 'Kelurahan/Desa',
            'target' => 'Target',
            'kebutuhan' => 'Kebutuhan',
            'sumber' => 'Sumber',
            'status' => 'Status',
            'tanggal' => 'Tanggal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelaksanaans()
    {
        return $this->hasMany(Pelaksanaan::className(), ['id_pelaksanaan' => 'id_usulan']);
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
