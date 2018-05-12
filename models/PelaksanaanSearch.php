<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelaksanaan;

/**
 * PelaksanaanSearch represents the model behind the search form about `app\models\Pelaksanaan`.
 */
class PelaksanaanSearch extends Pelaksanaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelaksanaan'], 'integer'],
            [['bukti'], 'safe'],
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
        $query = Pelaksanaan::find();

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
            'id_pelaksanaan' => $this->id_pelaksanaan,
        ]);

        $query->andFilterWhere(['like', 'bukti', $this->bukti]);

        return $dataProvider;
    }
}
