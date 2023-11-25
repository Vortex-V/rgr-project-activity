<?php

/**
 * @var View $this
 * @var RenderParams $viewParams
 */

use App\Component\View\RenderParams;
use App\Component\View\View;
use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>

<?php
echo $this->render('_sample', $this->renderParams);
