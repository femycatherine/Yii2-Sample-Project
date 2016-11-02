<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Persons]].
 *
 * @see Persons
 */
class PersonsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Persons[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Persons|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
