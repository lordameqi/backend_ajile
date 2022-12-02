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
 *
 * @property Nasabah $nasabah
 * @property Vendor $vendor
 */
class Testimoni extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
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
            [['id_nasabah', 'id_vendor', 'deskripsi_testimoni', 'bintang'], 'required'],
            [['id_nasabah', 'id_vendor'], 'integer'],
            [['deskripsi_testimoni'], 'string'],
            [['bintang'], 'number'],
            [['id_nasabah'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::class, 'targetAttribute' => ['id_nasabah' => 'id_nasabah']],
            [['id_vendor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::class, 'targetAttribute' => ['id_vendor' => 'id_vendor']],
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
    public function scenarios()
 {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['id_nasabah','id_vendor','deskripsi_testimoni','bintang']; 
        return $scenarios; 
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
     * Gets query for [[Vendor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::class, ['id_vendor' => 'id_vendor']);
    }
}
