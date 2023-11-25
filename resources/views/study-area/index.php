<?php

use App\Model\StudyArea\StudyArea;
use App\Model\StudyArea\StudyAreaSearch;
use app\widgets\gridView\GridViewWidget;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var StudyAreaSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Направления обучения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="study-area-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить направление обучения', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridViewWidget::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name:ntext',
            'study_direction:ntext',
            'education_form' => [
                'attribute' => 'education_form',
                'value' => static function (StudyArea $model) {
                    return StudyArea::getEducationFormLabel($model->education_form);
                },
                'filter' => Html::dropDownList(
                    Html::getInputName($searchModel, 'education_form'),
                    $searchModel->education_form ?? null,
                    ['' => 'Выберите'] + StudyArea::getEducationFormLabels(),
                    [
                        'class' => 'form-control form-select',
                    ],
                ),
            ],
            'duration',
            'cost',
            [
                'class' => ActionColumn::class,
                'urlCreator' => static function ($action, StudyArea $model) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]) ?>

    <?php Pjax::end(); ?>

</div>
