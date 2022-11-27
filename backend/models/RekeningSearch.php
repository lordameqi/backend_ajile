<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rekening;

/**
 * RekeningSearch represents the model behind the search form of `app\models\Rekening`.
 */
class RekeningSearch extends Rekening
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rekening', 'id_jenis_tabungan', 'saldo', 'id_nasabah'], 'integer'],
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
        $query = Rekening::find();

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
            'id_rekening' => $this->id_rekening,
            'id_jenis_tabungan' => $this->id_jenis_tabungan,
            'saldo' => $this->saldo,
            'id_nasabah' => $this->id_nasabah,
        ]);

        return $dataProvider;
    }
}
