<?php

namespace App\Model\StudyArea;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * InstitutionSearch represents the model behind the search form of `App\Model\Institution\Institution`.
 */
class StudyAreaSearch extends StudyArea
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id'], 'integer'],
            [['name', 'study_direction', 'education_form'], 'safe'],
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
        $query = StudyArea::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'duration' => $this->duration,
            'cost' => $this->cost,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'study_direction', $this->study_direction])
            ->andFilterWhere(['ilike', 'education_form', $this->education_form]);

        return $dataProvider;
    }
}
