<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_berobat".
 *
 * @property int $id_berobat
 * @property string $tgl_masuk
 * @property string $tgl_keluar
 * @property string $jenis_berobat
 * @property int $id_pasien
 * @property int $id_pegawai
 * @property int $id_penyakit
 * @property int $id_wilayah
 *
 * @property DetailBerobat[] $detailBerobats
 * @property Pasien $pasien
 * @property Pegawai $pegawai
 * @property Penyakit $penyakit
 * @property Wilayah $wilayah
 */
class TransaksiBerobat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_berobat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_masuk', 'jenis_berobat', 'id_pasien', 'id_pegawai', 'id_penyakit', 'id_wilayah'], 'required'],
            [['tgl_masuk', 'tgl_keluar'], 'safe'],
            [['id_pasien', 'id_pegawai', 'id_penyakit', 'id_wilayah'], 'integer'],
            [['jenis_berobat'], 'string', 'max' => 17],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::class, 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
            [['id_penyakit'], 'exist', 'skipOnError' => true, 'targetClass' => Penyakit::class, 'targetAttribute' => ['id_penyakit' => 'id_penyakit']],
            [['id_wilayah'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['id_wilayah' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_berobat' => 'Id Berobat',
            'tgl_masuk' => 'Masuk',
            'tgl_keluar' => 'Keluar',
            'jenis_berobat' => 'Jenis Berobat',
            'id_pasien' => 'Pasien',
            'id_pegawai' => 'Dokter',
            'id_penyakit' => 'Penyakit',
            'id_wilayah' => 'Ruangan',
        ];
    }

    /**
     * Gets query for [[DetailBerobats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailBerobats()
    {
        return $this->hasMany(DetailBerobat::class, ['id_berobat' => 'id_berobat']);
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[Pegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::class, ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * Gets query for [[Penyakit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenyakit()
    {
        return $this->hasOne(Penyakit::class, ['id_penyakit' => 'id_penyakit']);
    }

    /**
     * Gets query for [[Wilayah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'id_wilayah']);
    }
}
