<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiBerobat;

/**
 * TransaksiBerobatSearch represents the model behind the search form of `app\models\TransaksiBerobat`.
 */
class TransaksiBerobatSearch extends TransaksiBerobat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_berobat', 'id_pasien', 'id_pegawai', 'id_penyakit', 'id_wilayah'], 'integer'],
            [['tgl_masuk', 'tgl_keluar', 'jenis_berobat'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TransaksiBerobat::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_berobat' => $this->id_berobat,
            'tgl_masuk' => $this->tgl_masuk,
            'tgl_keluar' => $this->tgl_keluar,
            'id_pasien' => $this->id_pasien,
            'id_pegawai' => $this->id_pegawai,
            'id_penyakit' => $this->id_penyakit,
            'id_wilayah' => $this->id_wilayah,
        ]);

        $query->andFilterWhere(['like', 'jenis_berobat', $this->jenis_berobat]);

        return $dataProvider;
    }
}
