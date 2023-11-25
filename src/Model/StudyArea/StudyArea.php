<?php

namespace App\Model\StudyArea;

use App\Model\Institution\Institution;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "institutions".
 *
 * @property int $id
 * @property string $name
 * @property string $education_form
 * @property float $duration
 * @property float $cost
 *
 * @property-read Institution $institution
 *
 * @property-read array $educationForms
 */
class StudyArea extends ActiveRecord
{
    public const EDUCATION_FORM_IN_PERSON = 'in_person';
    public const EDUCATION_FORM_PART_TIME = 'part_time';
    public const EDUCATION_FORM_IN_ABSENTIA = 'in_absentia';

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'study_areas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'education_form', 'duration', 'cost'], 'required'],
            [['name', 'education_form'], 'string'],
            [['duration', 'cost'], 'number'],
            [['name'], 'unique'],
            ['education_form', 'in', 'range' => $this->getEducationForms(), 'strict' => true],
            ['institution_id', 'exist', 'targetRelation' => 'institution']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Наименования ВУЗа',
            'study_direction' => 'Наименование направления обучения',
            'education_form' => 'Форма обучения',
            'duration' => 'Продолжительность обучения',
            'cost' => 'Стоимость курса',
        ];
    }

    /**
     * {@inheritdoc}
     * @return StudyAreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudyAreaQuery(static::class);
    }

    public function getInstitution(): ActiveQuery
    {
        return $this->hasOne(Institution::class, ['id' => 'institution_id']);
    }

    public static function getEducationFormLabels(): array
    {
        return [
            self::EDUCATION_FORM_IN_PERSON => 'Очно',
            self::EDUCATION_FORM_PART_TIME => 'Очно-заочно',
            self::EDUCATION_FORM_IN_ABSENTIA => 'Заочно',
        ];
    }

    public static function getEducationFormLabel(string $name): string
    {
        return self::getEducationFormLabels()[$name] ?? $name;
    }

    public function getEducationForms(): array
    {
        return array_keys(self::getEducationFormLabels());
    }
}
