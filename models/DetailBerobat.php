<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_berobat".
 *
 * @property int $id
 * @property int $id_berobat
 * @property int $id_obat
 * @property int $id_tindakan
 * @property int $harga
 *
 * @property TransaksiBerobat $berobat
 * @property Obat $obat
 * @property Tindakan $tindakan
 */
class DetailBerobat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_berobat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_berobat', 'harga'], 'required'],
            [['id_berobat', 'id_obat', 'id_tindakan', 'harga'], 'integer'],
            [['id_berobat'], 'exist', 'skipOnError' => true, 'targetClass' => TransaksiBerobat::class, 'targetAttribute' => ['id_berobat' => 'id_berobat']],
            [['id_tindakan'], 'exist', 'skipOnError' => true, 'targetClass' => Tindakan::class, 'targetAttribute' => ['id_tindakan' => 'id_tindakan']],
            [['id_obat'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['id_obat' => 'id_obat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_berobat' => 'Id Berobat',
            'id_obat' => 'Id Obat',
            'id_tindakan' => 'Id Tindakan',
            'harga' => 'Harga',
        ];
    }

    /**
     * Gets query for [[Berobat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBerobat()
    {
        return $this->hasOne(TransaksiBerobat::class, ['id_berobat' => 'id_berobat']);
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id_obat' => 'id_obat']);
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id_tindakan' => 'id_tindakan']);
    }
}
