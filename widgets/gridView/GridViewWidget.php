<?php

namespace app\widgets\gridView;

use app\widgets\WidgetViewPathTrait;
use yii\grid\GridView;

class GridViewWidget extends GridView
{
    use WidgetViewPathTrait;

    public $layout = '{items}<br>{pager}';

    public $emptyText = 'Результатов не найдено.';

    public function renderItems(): string
    {
        return $this->render('index', [
            'items' => parent::renderItems()
        ]);
    }

}