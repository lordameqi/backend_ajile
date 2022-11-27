<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nasabah".
 *
 * @property int $id_nasabah
 * @property string|null $nama_nasabah
 * @property int|null $alamat_nasabah
 * @property int|null $no_hp_nasabah
 * @property string|null $jenis_kelamin
 * @property string|null $nik
 * @property int|null $id_rekening
 *
 * @property Cart[] $carts
 * @property Rekening $rekening
 * @property Rekening[] $rekenings
 * @property Transaksi[] $transaksis
 */
class Nasabah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nasabah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'no_hp_nasabah', 'id_rekening'], 'integer'],
            [['jenis_kelamin'], 'string'],
           
            ['no_hp_nasabah', 'match', 'pattern' => '/^62/'],
            [['nama_nasabah', 'nik','alamat_nasabah'], 'string', 'max' => 50],
            [['nik'], 'unique'],
            [['id_rekening'], 'exist', 'skipOnError' => true, 'targetClass' => Rekening::class, 'targetAttribute' => ['id_rekening' => 'id_rekening']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nasabah' => 'Id Nasabah',
            'nama_nasabah' => 'Nama Nasabah',
            'alamat_nasabah' => 'Alamat Nasabah',
            'no_hp_nasabah' => 'No Hp Nasabah',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nik' => 'Nik',
            'id_rekening' => 'Id Rekening',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['id_nasabah' => 'id_nasabah']);
    }

    /**
     * Gets query for [[Rekening]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRekening()
    {
        return $this->hasOne(Rekening::class, ['id_rekening' => 'id_rekening']);
    }

    /**
     * Gets query for [[Rekenings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRekenings()
    {
        return $this->hasMany(Rekening::class, ['id_nasabah' => 'id_nasabah']);
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['id_nasabah' => 'id_nasabah']);
    }
}
