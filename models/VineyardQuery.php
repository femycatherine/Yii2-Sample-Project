<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Vineyard]].
 *
 * @see Vineyard
 */
class VineyardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Vineyard[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Vineyard|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
