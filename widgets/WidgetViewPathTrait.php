<?php

namespace app\widgets;

use ReflectionClass;

trait WidgetViewPathTrait
{
    public function getViewPath(): string
    {
        $class = new ReflectionClass($this);
        $dirName = explode('/', dirname($class->getFileName()));
        $dirName = $dirName[array_key_last($dirName)];

        return "@app/resources/widgets/$dirName";
    }
}