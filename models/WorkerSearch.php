<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Worker;

/**
 * WorkerSearch represents the model behind the search form about `app\models\Worker`.
 */
class WorkerSearch extends Worker
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WorkerID', 'TaxFileNumber', 'SupervisorID'], 'integer'],
            [['WorkerType', 'WorkerName', 'Position', 'Address', 'Phone'], 'safe'],
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
        $query = Worker::find();

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
            'WorkerID' => $this->WorkerID,
            'TaxFileNumber' => $this->TaxFileNumber,
            'SupervisorID' => $this->SupervisorID,
        ]);

        $query->andFilterWhere(['like', 'WorkerType', $this->WorkerType])
            ->andFilterWhere(['like', 'WorkerName', $this->WorkerName])
            ->andFilterWhere(['like', 'Position', $this->Position])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Phone', $this->Phone]);

        return $dataProvider;
    }
}
