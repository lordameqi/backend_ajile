<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "testimoni".
 *
 * @property int $id_testimoni
 * @property int $id_nasabah
 * @property int $id_vendor
 * @property string $deskripsi_testimoni
 * @property float $bintang
 */
class Testimoni extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testimoni';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_testimoni', 'id_nasabah', 'id_vendor', 'deskripsi_testimoni', 'bintang'], 'required'],
            [['id_testimoni', 'id_nasabah', 'id_vendor'], 'integer'],
            [['deskripsi_testimoni'], 'string'],
            [['bintang'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_testimoni' => 'Id Testimoni',
            'id_nasabah' => 'Id Nasabah',
            'id_vendor' => 'Id Vendor',
            'deskripsi_testimoni' => 'Deskripsi Testimoni',
            'bintang' => 'Bintang',
        ];
    }
}
