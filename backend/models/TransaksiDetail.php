<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_detail".
 *
 * @property int $id_transaksi_detail
 * @property int $id_transaksi
 * @property int $id_culinary
 *
 * @property Culinary $culinary
 * @property Transaksi $transaksi
 */
class TransaksiDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_culinary'], 'required'],
            [['id_transaksi', 'id_culinary'], 'integer'],
            [['id_transaksi'], 'exist', 'skipOnError' => true, 'targetClass' => Transaksi::class, 'targetAttribute' => ['id_transaksi' => 'id_transaksi']],
            [['id_culinary'], 'exist', 'skipOnError' => true, 'targetClass' => Culinary::class, 'targetAttribute' => ['id_culinary' => 'id_culinary']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi_detail' => 'Id Transaksi Detail',
            'id_transaksi' => 'Id Transaksi',
            'id_culinary' => 'Id Culinary',
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
     * Gets query for [[Transaksi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksi()
    {
        return $this->hasOne(Transaksi::class, ['id_transaksi' => 'id_transaksi']);
    }
}
