<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penyakit;

/**
 * PenyakitSearch represents the model behind the search form of `app\models\Penyakit`.
 */
class PenyakitSearch extends Penyakit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penyakit'], 'integer'],
            [['kode_penyakit', 'nama', 'jenis'], 'safe'],
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
        $query = Penyakit::find();

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
            'id_penyakit' => $this->id_penyakit,
        ]);

        $query->andFilterWhere(['like', 'kode_penyakit', $this->kode_penyakit])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis', $this->jenis]);

        return $dataProvider;
    }
}
