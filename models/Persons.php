<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persons".
 *
 * @property integer $P_Id
 * @property string $LastName
 * @property string $FirstName
 * @property string $Address
 * @property string $City
 *
 * @property Orders[] $orders
 */
class Persons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['P_Id', 'LastName'], 'required'],
            [['P_Id'], 'integer'],
            [['LastName', 'FirstName', 'Address', 'City'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'P_Id' => 'P  ID',
            'LastName' => 'Last Name',
            'FirstName' => 'First Name',
            'Address' => 'Address',
            'City' => 'City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['P_Id' => 'P_Id']);
    }

    /**
     * @inheritdoc
     * @return PersonsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonsQuery(get_called_class());
    }
}
