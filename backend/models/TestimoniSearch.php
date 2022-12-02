<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Testimoni;

/**
 * TestimoniSearch represents the model behind the search form of `app\models\Testimoni`.
 */
class TestimoniSearch extends Testimoni
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_testimoni', 'id_nasabah', 'id_vendor'], 'integer'],
            [['deskripsi_testimoni'], 'safe'],
            [['bintang'], 'number'],
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
        $query = Testimoni::find();

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
            'id_testimoni' => $this->id_testimoni,
            'id_nasabah' => $this->id_nasabah,
            'id_vendor' => $this->id_vendor,
            'bintang' => $this->bintang,
        ]);

        $query->andFilterWhere(['like', 'deskripsi_testimoni', $this->deskripsi_testimoni]);

        return $dataProvider;
    }
}
