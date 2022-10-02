<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penyakit".
 *
 * @property int $id_penyakit
 * @property string $kode_penyakit
 * @property string $nama
 * @property string $jenis
 *
 * @property TransaksiBerobat $penyakit
 * @property TransaksiBerobat[] $transaksiBerobats
 */
class Penyakit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyakit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_penyakit', 'nama', 'jenis'], 'required'],
            [['kode_penyakit'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 50],
            [['jenis'], 'string', 'max' => 20],
            [['id_penyakit'], 'exist', 'skipOnError' => true, 'targetClass' => TransaksiBerobat::class, 'targetAttribute' => ['id_penyakit' => 'id_penyakit']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_penyakit' => 'Id Penyakit',
            'kode_penyakit' => 'Kode Penyakit',
            'nama' => 'Nama Panyakit',
            'jenis' => 'Jenis Penyakit',
        ];
    }

    /**
     * Gets query for [[Penyakit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenyakit()
    {
        return $this->hasOne(TransaksiBerobat::class, ['id_penyakit' => 'id_penyakit']);
    }

    /**
     * Gets query for [[TransaksiBerobats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiBerobats()
    {
        return $this->hasMany(TransaksiBerobat::class, ['id_penyakit' => 'id_penyakit']);
    }
}
