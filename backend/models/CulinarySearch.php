<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Culinary;

/**
 * CulinarySearch represents the model behind the search form of `app\models\Culinary`.
 */
class CulinarySearch extends Culinary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_culinary', 'harga', 'id_vendor'], 'integer'],
            [['nama_culinary', 'foto_culinary'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Culinary::find();

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
            'id_culinary' => $this->id_culinary,
            'harga' => $this->harga,
            'id_vendor' => $this->id_vendor,
        ]);

        $query->andFilterWhere(['like', 'nama_culinary', $this->nama_culinary])
            ->andFilterWhere(['like', 'foto_culinary', $this->foto_culinary]);

        return $dataProvider;
    }
}
