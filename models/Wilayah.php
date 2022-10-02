<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $id
 * @property string $kode_wilayah
 * @property string $nama
 *
 * @property TransaksiBerobat[] $transaksiBerobats
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_wilayah', 'nama'], 'required'],
            [['kode_wilayah'], 'string', 'max' => 17],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_wilayah' => 'Kode Wilayah',
            'nama' => 'Nama Wilayah',
        ];
    }

    /**
     * Gets query for [[TransaksiBerobats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiBerobats()
    {
        return $this->hasMany(TransaksiBerobat::class, ['id_wilayah' => 'id']);
    }
}
