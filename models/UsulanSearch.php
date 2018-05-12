<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usulan;

/**
 * UsulanSearch represents the model behind the search form about `app\models\Usulan`.
 */
class UsulanSearch extends Usulan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usulan', 'id_kategori', 'id_keldesa'], 'integer'],
            [['urusan', 'indikator', 'target', 'kebutuhan', 'sumber', 'justifikasi', 'renja', 'status', 'tanggal'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usulan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_usulan' => $this->id_usulan,
            'id_kategori' => $this->id_kategori,
            'id_keldesa' => $this->id_keldesa,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'urusan', $this->urusan])
            ->andFilterWhere(['like', 'indikator', $this->indikator])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'kebutuhan', $this->kebutuhan])
            ->andFilterWhere(['like', 'sumber', $this->sumber])
            ->andFilterWhere(['like', 'justifikasi', $this->justifikasi])
            ->andFilterWhere(['like', 'renja', $this->renja])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
