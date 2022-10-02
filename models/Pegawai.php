<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id_pegawai
 * @property int $nip
 * @property string $nama
 * @property string $tgl_lahir
 * @property string $jabatan
 * @property string $alamat
 * @property string $photo
 *
 * @property TransaksiBerobat[] $transaksiBerobats
 */
class Pegawai extends \yii\db\ActiveRecord
{
    public $photo;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'tgl_lahir', 'jabatan', 'alamat'], 'required'],
            [['nip'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 30],
            [['jabatan'], 'string', 'max' => 25],
            [['photo'], 'file', 'extensions' => 'png, jpeg, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nip' => 'NIP Pegawai',
            'nama' => 'Nama Pegawai',
            'tgl_lahir' => 'Tanggal Lahir',
            'jabatan' => 'Jabatan',
            'alamat' => 'Alamat',
            'photo' => 'Photo',
        ];
    }

    /**
     * Gets query for [[TransaksiBerobats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiBerobats()
    {
        return $this->hasMany(TransaksiBerobat::class, ['id_pegawai' => 'id_pegawai']);
    }
}
