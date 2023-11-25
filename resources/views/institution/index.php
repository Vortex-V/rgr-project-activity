<?php

use App\Model\Institution\Institution;
use App\Model\Institution\InstitutionSearch;
use app\widgets\gridView\GridViewWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var InstitutionSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Высшие образовательные учреждения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Institution', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridViewWidget::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name:ntext',
            [
                'class' => ActionColumn::class,
                'urlCreator' => static function ($action, Institution $model) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
