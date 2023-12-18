<?php

namespace App\Model\StudyArea;

use App\Model\Institution\Institution;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * InstitutionSearch represents the model behind the search form of `App\Model\Institution\Institution`.
 */
class StudyAreaSearch extends StudyArea
{
    public ?string $institutionName = '';

    private ?array $sortConfig = [];

    public function attributeLabels(): array
    {
        return parent::attributeLabels() + [
                'institutionName' => 'Наименование вуза'
            ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id'], 'integer'],
            [['name', 'study_direction', 'education_form', 'institutionName'], 'safe'],
            [['duration', 'cost'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $selfTable = StudyArea::tableName();
        $query = self::find()->select("$selfTable.*");

        $this->load($params);
        if ($this->validate()) {
            #region select
            $institutionTable = Institution::tableName();
            $query->addSelect([
                'institutionName' => "$institutionTable.name"
            ]);
            #endregion

            #region join
            $query->joinWith('institution');
            #endregion

            #region filter
            $query->andFilterWhere([
                "$selfTable.id" => $this->id,
                "$selfTable.duration" => $this->duration,
                "$selfTable.cost" => $this->cost,
            ]);

            $query->andFilterWhere(['ilike', "$selfTable.name", $this->name])
                ->andFilterWhere(['ilike', "$selfTable.education_form", $this->education_form]);
            #endregion
        }

        $this->sortConfig['params'] = $params;

        return new ActiveDataProvider([
            'query' => $query,
            'sort' => $this->sortConfig
        ]);
    }

    public function searchForEducationForm(array $params): ActiveDataProvider
    {
        if (empty($params['sort'])) {
            $params['sort'] = 'cost';
        }

        $this->sortConfig = [
            'attributes' => [
                'name',
                'cost' => [
                    'default' => SORT_ASC
                ]
            ],
            'enableMultiSort' => true
        ];

        return $this->search($params);
    }
}
