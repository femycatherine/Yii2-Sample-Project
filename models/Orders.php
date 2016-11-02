<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $O_Id
 * @property integer $OrderNo
 * @property integer $P_Id
 *
 * @property Persons $p
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['O_Id', 'OrderNo'], 'required'],
            [['O_Id', 'OrderNo', 'P_Id'], 'integer'],
            [['P_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Persons::className(), 'targetAttribute' => ['P_Id' => 'P_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'O_Id' => 'O  ID',
            'OrderNo' => 'Order No',
            'P_Id' => 'P  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(Persons::className(), ['P_Id' => 'P_Id']);
    }

    /**
     * @inheritdoc
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }
}
