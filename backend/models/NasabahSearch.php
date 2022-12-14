<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nasabah;

/**
 * NasabahSearch represents the model behind the search form of `app\models\Nasabah`.
 */
class NasabahSearch extends Nasabah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nasabah', 'alamat_nasabah', 'no_hp_nasabah', 'id_rekening'], 'integer'],
            [['nama_nasabah', 'jenis_kelamin', 'nik'], 'safe'],
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
        $query = Nasabah::find();

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
            'id_nasabah' => $this->id_nasabah,
            'alamat_nasabah' => $this->alamat_nasabah,
            'no_hp_nasabah' => $this->no_hp_nasabah,
            'id_rekening' => $this->id_rekening,
        ]);

        $query->andFilterWhere(['like', 'nama_nasabah', $this->nama_nasabah])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'nik', $this->nik]);

        return $dataProvider;
    }
}
