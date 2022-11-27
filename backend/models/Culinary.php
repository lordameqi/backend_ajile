<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "culinary".
 *
 * @property int $id_culinary
 * @property string|null $nama_culinary
 * @property int|null $harga
 * @property string|null $foto_culinary
 * @property int|null $id_vendor
 *
 * @property Cart[] $carts
 * @property Vendor $vendor
 */
class Culinary extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'culinary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['harga', 'id_vendor'], 'integer'],
            [['nama_culinary'], 'string', 'max' => 60],
            [['foto_culinary'], 'string', 'max' => 90],
            [['id_vendor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::class, 'targetAttribute' => ['id_vendor' => 'id_vendor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_culinary' => 'Id Culinary',
            'nama_culinary' => 'Nama Culinary',
            'harga' => 'Harga',
            'foto_culinary' => 'Foto Culinary',
            'id_vendor' => 'Id Vendor',
        ];
    }
    public function scenarios()
    {
           $scenarios = parent::scenarios();
           $scenarios['create'] = ['nama_culinary','harga','foto_culinary','id_vendor']; 
           return $scenarios; 
       }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['id_culinary' => 'id_culinary']);
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
