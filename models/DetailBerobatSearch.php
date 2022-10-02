<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailBerobat;

/**
 * DetailBerobatSearch represents the model behind the search form of `app\models\DetailBerobat`.
 */
class DetailBerobatSearch extends DetailBerobat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_berobat', 'id_obat', 'id_tindakan', 'harga'], 'integer'],
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
        $query = DetailBerobat::find();

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
            'id' => $this->id,
            'id_berobat' => $this->id_berobat,
            'id_obat' => $this->id_obat,
            'id_tindakan' => $this->id_tindakan,
            'harga' => $this->harga,
        ]);

        return $dataProvider;
    }
}
