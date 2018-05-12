<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_kabkota".
 *
 * @property integer $id_kabkota
 * @property string $nama
 * @property double $lat
 * @property double $lng
 *
 * @property Kec[] $Kecs
 */
class Kabkota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_kabkota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'lat', 'lng'], 'required'],
            [['lat', 'lng'], 'number'],
            [['nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kabkota' => 'Id Kabkota',
            'nama' => 'Nama',
            'lat' => 'Lat',
            'lng' => 'Lng',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecs()
    {
        return $this->hasMany(Kec::className(), ['id_kabkota' => 'id_kabkota']);
    }
}
