<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var App\Model\StudyArea\StudyArea $model */

$this->title = 'Направление обучения';
$this->params['breadcrumbs'][] = ['label' => 'Направление обучения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
