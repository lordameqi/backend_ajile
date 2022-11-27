<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property int $id_vendor
 * @property string $nama
 * @property string $alamat
 * @property string $no_hp
 * @property float $rating
 * @property string $foto_vendor
 * @property string $latitude
 * @property string $longtitude
 * @property int $kapasitas
 * @property int $id_kategori
 * @property string $halal
 * @property int $jarak
 *
 * @property Cart[] $carts
 * @property Culinary[] $culinaries
 * @property KategoriRestraurant $kategori
 * @property Transaksi[] $transaksis
 */
class Vendor extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'no_hp', 'rating', 'foto_vendor', 'latitude', 'longtitude', 'kapasitas', 'id_kategori', 'halal', 'jarak'], 'required'],
            [['rating'], 'number'],
            [['kapasitas', 'id_kategori', 'jarak'], 'integer'],
            [['halal'], 'string'],
            [['nama', 'alamat', 'latitude', 'longtitude'], 'string', 'max' => 60],
            [['no_hp'], 'string', 'max' => 14],
            [['foto_vendor'], 'string', 'max' => 99],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriRestraurant::class, 'targetAttribute' => ['id_kategori' => 'id_kategori']],
        ];
    }
    public function scenarios()
 {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['nama','alamat','no_hp','rating','foto_vendor','latitude','longtitude','kapasitas','halal','jarak','id_kategori']; 
        return $scenarios; 
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vendor' => 'Id Vendor',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'rating' => 'Rating',
            'foto_vendor' => 'Foto Vendor',
            'latitude' => 'Latitude',
            'longtitude' => 'Longtitude',
            'kapasitas' => 'Kapasitas',
            'id_kategori' => 'Id Kategori',
            'halal' => 'Halal',
            'jarak' => 'Jarak',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['id_vendor' => 'id_vendor']);
    }

    /**
     * Gets query for [[Culinaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCulinaries()
    {
        return $this->hasMany(Culinary::class, ['id_vendor' => 'id_vendor']);
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(KategoriRestraurant::class, ['id_kategori' => 'id_kategori']);
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['id_vendor' => 'id_vendor']);
    }
}
