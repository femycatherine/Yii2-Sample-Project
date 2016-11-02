<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Grape]].
 *
 * @see Grape
 */
class GrapeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Grape[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Grape|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
