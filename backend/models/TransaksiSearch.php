<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaksi;

/**
 * TransaksiSearch represents the model behind the search form of `app\models\Transaksi`.
 */
class TransaksiSearch extends Transaksi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_rekening', 'id_vendor', 'id_nasabah', 'id_paket', 'jumlah', 'total_harga', 'id_culinary', 'jumlah_orang'], 'integer'],
            [['kode_unik', 'status', 'is_wallet', 'tanggal_jam_pesan', 'exec_time'], 'safe'],
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
        $query = Transaksi::find();

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
            'id_transaksi' => $this->id_transaksi,
            'id_rekening' => $this->id_rekening,
            'id_vendor' => $this->id_vendor,
            'id_nasabah' => $this->id_nasabah,
            'id_paket' => $this->id_paket,
            'jumlah' => $this->jumlah,
            'total_harga' => $this->total_harga,
            'id_culinary' => $this->id_culinary,
            'jumlah_orang' => $this->jumlah_orang,
        ]);

        $query->andFilterWhere(['like', 'kode_unik', $this->kode_unik])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'is_wallet', $this->is_wallet])
            ->andFilterWhere(['like', 'tanggal_jam_pesan', $this->tanggal_jam_pesan])
            ->andFilterWhere(['like', 'exec_time', $this->exec_time]);

        return $dataProvider;
    }
}
