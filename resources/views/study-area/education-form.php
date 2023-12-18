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

$this->title = "Форма обучения";
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    'name' => ['attribute' => 'name'],
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

$queryParams = Yii::$app->request->getQueryParam($searchModel->formName());
$educationForm = StudyArea::getEducationFormLabel($queryParams['education_form']) ?? 'не выбрано';
?>
<div class="study-area-index">

    <h1><?= Html::encode($this->title).": <i>$educationForm</i>" ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridViewWidget::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]) ?>

    <?php Pjax::end(); ?>

</div>
