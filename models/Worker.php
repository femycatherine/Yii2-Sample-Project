<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "worker".
 *
 * @property integer $WorkerID
 * @property string $WorkerType
 * @property string $WorkerName
 * @property string $Position
 * @property integer $TaxFileNumber
 * @property string $Address
 * @property string $Phone
 * @property integer $SupervisorID
 *
 * @property Vineyard[] $vineyards
 * @property Worker $supervisor
 * @property Worker[] $workers
 */
class Worker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WorkerType', 'WorkerName', 'Position', 'TaxFileNumber'], 'required'],
            [['TaxFileNumber', 'SupervisorID'], 'integer'],
            [['WorkerType', 'WorkerName', 'Position'], 'string', 'max' => 45],
            [['Address'], 'string', 'max' => 100],
            [['Phone'], 'string', 'max' => 20],
            [['SupervisorID'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::className(), 'targetAttribute' => ['SupervisorID' => 'WorkerID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'WorkerID' => 'Worker ID',
            'WorkerType' => 'Worker Type',
            'WorkerName' => 'Worker Name',
            'Position' => 'Position',
            'TaxFileNumber' => 'Tax File Number',
            'Address' => 'Address',
            'Phone' => 'Phone',
            'SupervisorID' => 'Supervisor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVineyards()
    {
        return $this->hasMany(Vineyard::className(), ['FarmerID' => 'WorkerID']);
    }

    public function getName() {
    	$query = new Query;
    	// compose the query
    	$query->select('WorkerID, WorkerName')
    	->from('worker')
    	->limit(10);
    	// build and execute the query
    	$rows = $query->all();
    	
    	foreach ($rows as $row) {
    		$key = $row['WorkerID'];
    		$value = $row['WorkerName'];
    		$data[$key] = $value;
    	}
    	return $data;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupervisor()
    {
        return $this->hasOne(Worker::className(), ['WorkerID' => 'SupervisorID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Worker::className(), ['SupervisorID' => 'WorkerID']);
    }

    /**
     * @inheritdoc
     * @return WorkerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkerQuery(get_called_class());
    }
}
