<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_kec".
 *
 * @property integer $id_kec
 * @property string $nama
 * @property integer $id_kabkota
 *
 * @property Kabkota $idKabkota
 * @property Keldesa[] $Keldesas
 */
class Kec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_kec';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'id_kabkota'], 'required'],
            [['id_kabkota'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['id_kabkota'], 'exist', 'skipOnError' => true, 'targetClass' => Kabkota::className(), 'targetAttribute' => ['id_kabkota' => 'id_kabkota']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kec' => 'Id Kec',
            'nama' => 'Nama',
            'id_kabkota' => 'Id Kabkota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKabkota()
    {
        return $this->hasOne(Kabkota::className(), ['id_kabkota' => 'id_kabkota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeldesas()
    {
        return $this->hasMany(Keldesa::className(), ['id_kec' => 'id_kec']);
    }
}
