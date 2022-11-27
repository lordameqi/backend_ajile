<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rekening".
 *
 * @property int $id_rekening
 * @property int|null $id_jenis_tabungan
 * @property int|null $saldo
 * @property int $id_nasabah
 *
 * @property JenisTabungan $jenisTabungan
 * @property Nasabah $nasabah
 * @property Nasabah[] $nasabahs
 * @property Transaksi[] $transaksis
 */
class Rekening extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rekening';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_tabungan', 'saldo', 'id_nasabah'], 'integer'],
            [['id_nasabah'], 'required'],
            [['id_jenis_tabungan'], 'exist', 'skipOnError' => true, 'targetClass' => JenisTabungan::class, 'targetAttribute' => ['id_jenis_tabungan' => 'id_jenis_tabunugan']],
            [['id_nasabah'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::class, 'targetAttribute' => ['id_nasabah' => 'id_nasabah']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rekening' => 'Id Rekening',
            'id_jenis_tabungan' => 'Id Jenis Tabungan',
            'saldo' => 'Saldo',
            'id_nasabah' => 'Id Nasabah',
        ];
    }
    public function scenarios()
    {
           $scenarios = parent::scenarios();
           $scenarios['create'] = ['id_jenis_tabungan','id_nasabah','saldo']; 
           return $scenarios; 
       }

    /**
     * Gets query for [[JenisTabungan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisTabungan()
    {
        return $this->hasOne(JenisTabungan::class, ['id_jenis_tabunugan' => 'id_jenis_tabungan']);
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
     * Gets query for [[Nasabahs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNasabahs()
    {
        return $this->hasMany(Nasabah::class, ['id_rekening' => 'id_rekening']);
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['id_rekening' => 'id_rekening']);
    }
}
