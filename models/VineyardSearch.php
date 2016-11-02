<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vineyard;

/**
 * VineyardSearch represents the model behind the search form about `app\models\Vineyard`.
 */
class VineyardSearch extends Vineyard
{
    /**
     * @inheritdoc
     */
	
	public $WorkerName;
	public $GrapeType;
	public $vineyardName;
    public function rules()
    {
        return [
            [['VineyardID','vineyardName', 'WorkerName', 'GrapeType', 'HarvestedAmount', 'RipenessPercent'], 'integer'],
            [['VineyardName', 'ComeFrom'], 'safe'],
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
        $query = Vineyard::findCustom();

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
            'VineyardID' => $this->VineyardID,
            'VineyardName' => $this->VineyardName,
            'GrapeID' => $this->GrapeID,
            'HarvestedAmount' => $this->HarvestedAmount,
            'RipenessPercent' => $this->RipenessPercent,
        ]);

        $query->andFilterWhere(['like', 'VineyardName', $this->VineyardName])
            ->andFilterWhere(['like', 'ComeFrom', $this->ComeFrom]);

        return $dataProvider;
    }
}
