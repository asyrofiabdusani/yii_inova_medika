<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id_obat
 * @property int $kode_obat
 * @property string $nama
 * @property int $harga
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_obat', 'nama', 'harga'], 'required'],
            [['harga'], 'integer'],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obat' => 'Id Obat',
            'kode_obat' => 'Kode Obat',
            'nama' => 'Nama Obat',
            'harga' => 'Harga',
        ];
    }
}
