<?php

namespace app\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "vineyard".
 *
 * @property integer $VineyardID
 * @property string $VineyardName
 * @property integer $FarmerID
 * @property integer $GrapeID
 * @property string $ComeFrom
 * @property integer $HarvestedAmount
 * @property integer $RipenessPercent
 *
 * @property Worker $farmer
 * @property Grape $grape
 */
class Vineyard extends \yii\db\ActiveRecord 
{
    /**
     * @inheritdoc
     */
	
    public static function tableName()
    {
        return 'vineyard';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VineyardName', 'ComeFrom'], 'required'],
            [['FarmerID', 'GrapeID', 'HarvestedAmount', 'RipenessPercent'], 'integer'],
            [['VineyardName', 'ComeFrom'], 'string', 'max' => 45],
            [['FarmerID'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::className(), 'targetAttribute' => ['FarmerID' => 'WorkerID']],
            [['GrapeID'], 'exist', 'skipOnError' => true, 'targetClass' => Grape::className(), 'targetAttribute' => ['GrapeID' => 'GrapeID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VineyardID' => 'Vineyard ID',
            'VineyardName' => 'Vineyard Name',
            'FarmerID' => 'Farmer ID',
            'GrapeID' => 'Grape ID',
            'ComeFrom' => 'Come From',
            'HarvestedAmount' => 'Harvested Amount',
            'RipenessPercent' => 'Ripeness Percent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getWorkerName()
    {
    	$workermodel = new Worker();
    	$value = $workermodel->getName();
    	return $value;
    }
    
    public function getGrapeName()
    {
    	$grapemodel = new Grape();
    	$value = $grapemodel->getName();
    	return $value;

    }
    
    public function getFarmer()
    {
        return $this->hasOne(Worker::className(), ['WorkerID' => 'FarmerID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrape()
    {
        return $this->hasOne(Grape::className(), ['GrapeID' => 'GrapeID']);
    }

    /**
     * @inheritdoc
     * @return VineyardQuery the active query used by this AR class.
     */
    
    public static function findCustom()
    {
    	$query = new Query;
    	// compose the query
    	//SELECT vineyardName,WorkerName,GrapeType FROM `grape`,worker,vineyard WHERE 
    	//vineyard.`GrapeID` = grape.GrapeID and vineyard.FarmerID = worker.WorkerID
    	$query->select('vineyard.VineyardID as VineyardID,HarvestedAmount,RipenessPercent, vineyardName,WorkerName,GrapeType')
    	->from('grape,worker,vineyard')
    	->where('vineyard.`GrapeID` = grape.GrapeID and vineyard.FarmerID = worker.WorkerID')
    	->limit(10);
    	// build and execute the query
    	$rows = $query->all();
    	
    	return $query;
    }
    
    public static function find()
    {
        return new VineyardQuery(get_called_class());
    }
}
