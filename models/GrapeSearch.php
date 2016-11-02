<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Grape;

/**
 * GrapeSearch represents the model behind the search form about `app\models\Grape`.
 */
class GrapeSearch extends Grape
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GrapeID', 'JuiceConversionRatio', 'AgingRequirement'], 'integer'],
            [['GrapeType', 'StorageContainer'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Grape::find();

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
            'GrapeID' => $this->GrapeID,
            'JuiceConversionRatio' => $this->JuiceConversionRatio,
            'AgingRequirement' => $this->AgingRequirement,
        ]);

        $query->andFilterWhere(['like', 'GrapeType', $this->GrapeType])
            ->andFilterWhere(['like', 'StorageContainer', $this->StorageContainer]);

        return $dataProvider;
    }
}
