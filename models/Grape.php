<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "grape".
 *
 * @property integer $GrapeID
 * @property string $GrapeType
 * @property integer $JuiceConversionRatio
 * @property string $StorageContainer
 * @property integer $AgingRequirement
 *
 * @property Vineyard[] $vineyards
 */
class Grape extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grape';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GrapeID', 'GrapeType'], 'required'],
            [['GrapeID', 'JuiceConversionRatio', 'AgingRequirement'], 'integer'],
            [['StorageContainer'], 'string'],
            [['GrapeType'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GrapeID' => 'Grape ID',
            'GrapeType' => 'Grape Type',
            'JuiceConversionRatio' => 'Juice Conversion Ratio',
            'StorageContainer' => 'Storage Container',
            'AgingRequirement' => 'Aging Requirement',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getName() {
    	$query = new Query;
    	// compose the query
    	$query->select('GrapeID, GrapeType')
    	->from('grape')
    	->limit(10);
    	// build and execute the query
    	$rows = $query->all();
    	 
    	foreach ($rows as $row) {
    		$key = $row['GrapeID'];
    		$value = $row['GrapeType'];
    		$data[$key] = $value;
    	}
    	return $data;
    }
    
    public function getVineyards()
    {
        return $this->hasMany(Vineyard::className(), ['GrapeID' => 'GrapeID']);
    }

    /**
     * @inheritdoc
     * @return GrapeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GrapeQuery(get_called_class());
    }
}
