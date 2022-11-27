<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_tabungan".
 *
 * @property int $id_jenis_tabunugan
 * @property string|null $nama_tabungan
 *
 * @property Rekening[] $rekenings
 */
class JenisTabungan extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_tabungan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_tabungan'], 'string', 'max' => 20],
        ];
    }

    public function scenarios()
    {
           $scenarios = parent::scenarios();
           $scenarios['create'] = ['nama_tabungan']; 
           return $scenarios; 
       }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_tabunugan' => 'Id Jenis Tabunugan',
            'nama_tabungan' => 'Nama Tabungan',
        ];
    }
 

    /**
     * Gets query for [[Rekenings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRekenings()
    {
        return $this->hasMany(Rekening::class, ['id_jenis_tabungan' => 'id_jenis_tabunugan']);
    }
}
