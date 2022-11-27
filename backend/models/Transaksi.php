<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id_transaksi
 * @property int|null $id_rekening
 * @property int|null $id_vendor
 * @property int|null $id_nasabah
 * @property string|null $kode_unik
 * @property int|null $id_paket
 * @property int|null $jumlah
 * @property string|null $status
 * @property int|null $total_harga
 * @property string|null $is_wallet
 * @property int|null $id_culinary
 * @property string|null $tanggal_jam_pesan
 * @property string|null $exec_time
 * @property int $jumlah_orang
 *
 * @property Nasabah $nasabah
 * @property Paket $paket
 * @property Rekening $rekening
 * @property Vendor $vendor
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rekening', 'id_vendor', 'id_nasabah', 'id_paket', 'jumlah', 'total_harga', 'id_culinary', 'jumlah_orang'], 'integer'],
            [['status', 'is_wallet'], 'string'],
            [['jumlah_orang'], 'required'],
            [['kode_unik', 'tanggal_jam_pesan'], 'string', 'max' => 40],
            [['exec_time'], 'string', 'max' => 24],
            [['id_paket'], 'exist', 'skipOnError' => true, 'targetClass' => Paket::class, 'targetAttribute' => ['id_paket' => 'id_paket']],
            [['id_vendor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::class, 'targetAttribute' => ['id_vendor' => 'id_vendor']],
            [['id_nasabah'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::class, 'targetAttribute' => ['id_nasabah' => 'id_nasabah']],
            [['id_rekening'], 'exist', 'skipOnError' => true, 'targetClass' => Rekening::class, 'targetAttribute' => ['id_rekening' => 'id_rekening']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi' => 'Id Transaksi',
            'id_rekening' => 'Id Rekening',
            'id_vendor' => 'Id Vendor',
            'id_nasabah' => 'Id Nasabah',
            'kode_unik' => 'Kode Unik',
            'id_paket' => 'Id Paket',
            'jumlah' => 'Jumlah',
            'status' => 'Status',
            'total_harga' => 'Total Harga',
            'is_wallet' => 'Is Wallet',
            'id_culinary' => 'Id Culinary',
            'tanggal_jam_pesan' => 'Tanggal Jam Pesan',
            'exec_time' => 'Exec Time',
            'jumlah_orang' => 'Jumlah Orang',
        ];
    }

    /**
     * Gets query for [[Nasabah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNasabah()
    {
        return $this->hasOne(Nasabah::class, ['id_nasabah' => 'id_nasabah']);
    }

    /**
     * Gets query for [[Paket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaket()
    {
        return $this->hasOne(Paket::class, ['id_paket' => 'id_paket']);
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
     * Gets query for [[Vendor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::class, ['id_vendor' => 'id_vendor']);
    }
}
