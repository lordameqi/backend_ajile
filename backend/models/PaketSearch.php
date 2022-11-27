<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paket;

/**
 * PaketSearch represents the model behind the search form of `app\models\Paket`.
 */
class PaketSearch extends Paket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paket'], 'integer'],
            [['nama_paket'], 'safe'],
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
        $query = Paket::find();

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
            'id_paket' => $this->id_paket,
        ]);

        $query->andFilterWhere(['like', 'nama_paket', $this->nama_paket]);

        return $dataProvider;
    }
}
