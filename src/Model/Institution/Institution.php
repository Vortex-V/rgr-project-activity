<?php

namespace App\Model\Institution;

use App\Model\StudyArea\StudyArea;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "institutions".
 *
 * @property int $id
 * @property string $name
 *
 * @property StudyArea[] $studyAreas
 */
class Institution extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'institutions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование заведения',
        ];
    }

    /**
     * Gets query for [[StudyAreas]].
     *
     * @return ActiveQuery|StudyAreaQuery
     */
    public function getStudyAreas(): ActiveQuery
    {
        return $this->hasMany(StudyArea::class, ['institution_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return InstitutionQuery the active query used by this AR class.
     */
    public static function find(): InstitutionQuery
    {
        return new InstitutionQuery(static::class);
    }
}
