<?php

namespace App\Model\StudyArea;

/**
 * This is the ActiveQuery class for [[Institution]].
 *
 * @see StudyArea
 */
class StudyAreaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StudyArea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StudyArea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
