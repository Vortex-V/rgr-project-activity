<?php

use App\Component\View\View;
use App\Model\StudyArea\StudyArea;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var StudyArea $model
 * @var ActiveForm $for
 */
?>

<div class="institution-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'institution_id')->dropDownList($model->getInstitutionItems()) ?>

    <?= $form->field($model, 'education_form')->dropDownList(['Выберите']+StudyArea::getEducationFormLabels()) ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
