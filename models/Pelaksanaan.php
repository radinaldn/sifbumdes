<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pelaksanaan".
 *
 * @property integer $id_pelaksanaan
 * @property string $bukti
 *
 * @property Usulan $idPelaksanaan
 */
class Pelaksanaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_pelaksanaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelaksanaan', 'bukti'], 'required'],
            [['id_pelaksanaan'], 'integer'],
            [['bukti'], 'string', 'max' => 255],
            [['id_pelaksanaan'], 'exist', 'skipOnError' => true, 'targetClass' => Usulan::className(), 'targetAttribute' => ['id_pelaksanaan' => 'id_usulan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pelaksanaan' => 'Pelaksanaan',
            'bukti' => 'Bukti',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPelaksanaan()
    {
        return $this->hasOne(Usulan::className(), ['id_usulan' => 'id_pelaksanaan']);
    }

    public function getImageurl()
    {
        return Yii::$app->request->BaseUrl.'files/images/'.$this->bukti;
    }
}
