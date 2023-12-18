<?php

use App\Model\StudyArea\StudyArea;
use App\Model\StudyArea\StudyAreaSearch;
use app\widgets\gridView\GridViewWidget;
use yii\helpers\Html;
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

$columns = [
    'id' => ['attribute' => 'id'],
    'name' => ['attribute' => 'name'],
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
    'duration' => ['attribute' => 'duration'],
    'cost' => ['attribute' => 'cost'],
    'institutionName' => [
        'attribute' => 'institutionName'
    ],
    'action' => [
        'class' => ActionColumn::class,
        'urlCreator' => static function ($action, StudyArea $model) {
            return Url::toRoute([$action, 'id' => $model->id]);
        }
    ],

];
?>
<div class="study-area-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex flex-column py-2">
        <div class="mb-3">
            <?= Html::a('Добавить направление обучения', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            <span>Форма обучения</span>
            <?= Html::beginForm('education-form', 'get', [
                    'class' => 'd-flex ms-1'
            ]) ?>
                <?= Html::dropDownList(
                    Html::getInputName($searchModel, 'education_form'),
                    null,
                    ['' => 'Выберите'] + StudyArea::getEducationFormLabels(),
                    [
                        'class' => 'form-control dropdown me-1'
                    ]
                ) ?>
                <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
            <?= Html::endForm() ?>
        </div>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridViewWidget::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]) ?>

    <?php Pjax::end(); ?>

</div>
