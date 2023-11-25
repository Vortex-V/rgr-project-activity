<?php

use yii\bootstrap5\Nav;

$options = [
    'class' => 'mb-1',
];
$linkOptions = [
    'class' => 'btn btn-dark text-light px-3 py-2',
];

$items = [
    ['label' => 'Сведения о вузах', 'url' => ['/institution/index']],
    ['label' => 'Направления обучения', 'url' => ['/study-area/index']],
    ['label' => 'Форма обучения', 'url' => ['/study-area/education-form']],
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
