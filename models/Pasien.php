<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id_pasien
 * @property int $no_ktp
 * @property string $nama
 * @property string $tgl_lahir
 * @property string $kelamin
 * @property string $alamat
 *
 * @property TransaksiBerobat[] $transaksiBerobats
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_ktp', 'nama', 'tgl_lahir', 'kelamin', 'alamat'], 'required'],
            [['no_ktp'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'no_ktp' => 'Nomor KTP',
            'nama' => 'Nama Pasien',
            'tgl_lahir' => 'Tanggal Lahir',
            'kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * Gets query for [[TransaksiBerobats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiBerobats()
    {
        return $this->hasMany(TransaksiBerobat::class, ['id_pasien' => 'id_pasien']);
    }
}
