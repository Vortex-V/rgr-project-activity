<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var App\Model\StudyArea\StudyArea $model
 * @var yii\widgets\ActiveForm $for
 */
?>

<div class="institution-form">

    <?php $form = ActiveForm::begin([
            'action' => 'create',
    ]); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'study_direction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'education_form')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
