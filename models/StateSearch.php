<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\State;

/**
 * StateSearch represents the model behind the search form of `app\models\State`.
 */
class StateSearch extends State
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state_id'], 'integer'],
            [['state', 'fk_country'], 'safe'],
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
        $query = State::find();

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
        // revisar con que nombre del metodo tiene realizado el modelo State
        // la relacion entre country y state
        // empieza con minuscula
        $query->joinWith('fkCountry');

        // grid filtering conditions
        $query->andFilterWhere([
            'state_id' => $this->state_id,
            // 'fk_country' => $this->fk_country,
        ]);

        $query->andFilterWhere(['like', 'state', $this->state])
            // solo ponemos country y no Country.country
            ->andFilterWhere(['like', 'country', $this->fk_country]);

        return $dataProvider;
    }
}
