<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var App\Model\StudyArea\StudyArea $model */

$this->title = 'Направление обучения: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Направление обучения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="institution-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
