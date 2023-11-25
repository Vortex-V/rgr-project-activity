<?php

namespace app\widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;

class BaseWidget extends Widget
{
    protected array $requiredAttrs = [];

    public function init(): void
    {
        $err = array_reduce($this->requiredAttrs, function (array $carry, string $name) {
            if (is_null($this->$name)) {
                $carry[] = $name;
                return $carry;
            }
            return $carry;
        }, []);
        if (!empty($err)) {
            throw new InvalidConfigException("Required attributes: " . join(', ', $err));
        }
        parent::init();
    }
}