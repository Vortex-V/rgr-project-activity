<?php

use yii\bootstrap5\Nav;

$options = [
    'class' => '',
];
$linkOptions = [
    'class' => 'btn btn-dark text-light px-3 py-2',
];

$items = [
    ['label' => 'Сведения о вузах', 'url' => ['/study-area/index']],
    ['label' => 'Форма обучения', 'url' => ['/site/index']],
];

foreach ($items as &$item) {
    $item['options'] = $options;
    $item['linkOptions'] = $linkOptions;
}
unset($item);
?>

<?= Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => $items
]) ?>
