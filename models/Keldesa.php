<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_keldesa".
 *
 * @property integer $id_keldesa
 * @property string $nama
 * @property integer $id_kec
 *
 * @property Kec $idKec
 * @property Usulan[] $tbUsulans
 */
class Keldesa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_keldesa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'id_kec'], 'required'],
            [['id_kec'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['id_kec'], 'exist', 'skipOnError' => true, 'targetClass' => Kec::className(), 'targetAttribute' => ['id_kec' => 'id_kec']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_keldesa' => 'Id Keldesa',
            'nama' => 'Kelurahan/Desa',
            'id_kec' => 'Id Kec',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKec()
    {
        return $this->hasOne(Kec::className(), ['id_kec' => 'id_kec']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsulans()
    {
        return $this->hasMany(Usulan::className(), ['id_keldesa' => 'id_keldesa']);
    }
}
