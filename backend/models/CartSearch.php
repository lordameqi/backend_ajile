<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cart;

/**
 * CartSearch represents the model behind the search form of `app\models\Cart`.
 */
class CartSearch extends Cart
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cart', 'id_vendor', 'id_nasabah', 'id_paket', 'id_culinary', 'total_harga', 'jumlah', 'jumlah_orang'], 'integer'],
            [['waktu_jam'], 'safe'],
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
        $query = Cart::find();

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
            'id_cart' => $this->id_cart,
            'id_vendor' => $this->id_vendor,
            'id_nasabah' => $this->id_nasabah,
            'id_paket' => $this->id_paket,
            'id_culinary' => $this->id_culinary,
            'total_harga' => $this->total_harga,
            'jumlah' => $this->jumlah,
            'jumlah_orang' => $this->jumlah_orang,
        ]);

        $query->andFilterWhere(['like', 'waktu_jam', $this->waktu_jam]);

        return $dataProvider;
    }
}
