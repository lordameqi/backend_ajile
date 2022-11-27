<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id_cart
 * @property int|null $id_vendor
 * @property int|null $id_nasabah
 * @property int|null $id_paket
 * @property int|null $id_culinary
 * @property int|null $total_harga
 * @property int|null $jumlah
 * @property string|null $waktu_jam
 * @property int $jumlah_orang
 *
 * @property Culinary $culinary
 * @property Nasabah $nasabah
 * @property Paket $paket
 * @property Vendor $vendor
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vendor', 'id_nasabah', 'id_paket', 'id_culinary', 'total_harga', 'jumlah', 'jumlah_orang'], 'integer'],
            [['jumlah_orang'], 'required'],
            [['waktu_jam'], 'string', 'max' => 26],
            [['id_vendor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::class, 'targetAttribute' => ['id_vendor' => 'id_vendor']],
            [['id_nasabah'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::class, 'targetAttribute' => ['id_nasabah' => 'id_nasabah']],
            [['id_paket'], 'exist', 'skipOnError' => true, 'targetClass' => Paket::class, 'targetAttribute' => ['id_paket' => 'id_paket']],
            [['id_culinary'], 'exist', 'skipOnError' => true, 'targetClass' => Culinary::class, 'targetAttribute' => ['id_culinary' => 'id_culinary']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cart' => 'Id Cart',
            'id_vendor' => 'Id Vendor',
            'id_nasabah' => 'Id Nasabah',
            'id_paket' => 'Id Paket',
            'id_culinary' => 'Id Culinary',
            'total_harga' => 'Total Harga',
            'jumlah' => 'Jumlah',
            'waktu_jam' => 'Waktu Jam',
            'jumlah_orang' => 'Jumlah Orang',
        ];
    }

    /**
     * Gets query for [[Culinary]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCulinary()
    {
        return $this->hasOne(Culinary::class, ['id_culinary' => 'id_culinary']);
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
     * Gets query for [[Vendor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::class, ['id_vendor' => 'id_vendor']);
    }
}
