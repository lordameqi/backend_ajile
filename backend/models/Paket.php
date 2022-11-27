<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paket".
 *
 * @property int $id_paket
 * @property string|null $nama_paket
 *
 * @property Cart[] $carts
 * @property Transaksi[] $transaksis
 */
class Paket extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_paket'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_paket' => 'Id Paket',
            'nama_paket' => 'Nama Paket',
        ];
    }
    public function scenarios()
    {
           $scenarios = parent::scenarios();
           $scenarios['create'] = ['nama_paket']; 
           return $scenarios; 
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['id_paket' => 'id_paket']);
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['id_paket' => 'id_paket']);
    }
}
