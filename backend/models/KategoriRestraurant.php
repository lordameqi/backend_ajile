<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_restraurant".
 *
 * @property int $id_kategori
 * @property string $nama_kategori
 *
 * @property Vendor[] $vendors
 */
class KategoriRestraurant extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_restraurant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kategori'], 'required'],
            [['nama_kategori'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kategori' => 'Id Kategori',
            'nama_kategori' => 'Nama Kategori',
        ];
    }
    public function scenarios()
    {
           $scenarios = parent::scenarios();
           $scenarios['create'] = ['nama_kategori']; 
           return $scenarios; 
       }

    /**
     * Gets query for [[Vendors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendors()
    {
        return $this->hasMany(Vendor::class, ['id_kategori' => 'id_kategori']);
    }
}
