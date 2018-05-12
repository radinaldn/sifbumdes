<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_kategori".
 *
 * @property integer $id_kategori
 * @property string $nama
 *
 * @property TbUser[] $tbUsers
 * @property TbUsulan[] $tbUsulans
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kategori' => 'Id Kategori',
            'nama' => 'Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbUsers()
    {
        return $this->hasMany(TbUser::className(), ['id_kategori' => 'id_kategori']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbUsulans()
    {
        return $this->hasMany(TbUsulan::className(), ['id_kategori' => 'id_kategori']);
    }
}
