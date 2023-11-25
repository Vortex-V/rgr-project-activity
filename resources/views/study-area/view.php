<?php

use App\Model\StudyArea\StudyArea;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var App\Model\StudyArea\StudyArea $model
 */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Форма обучения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="institution-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'education_form' => [
                    'attribute' => 'education_form',
                'value' => static function (StudyArea $model) {
                    return StudyArea::getEducationFormLabel($model->education_form);
                }
            ],
            'duration',
            'cost',
            'institution_id' => [
                'attribute' => 'institution_id',
                'value' => static function (StudyArea $model) {
                    return $model->institution->name;
                }
            ]
        ],
    ]) ?>

</div>
