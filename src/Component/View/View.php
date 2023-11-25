<?php

namespace App\Component\View;

/**
 * @property-read $renderParams @method getRenderParams()
 */
class View extends \yii\web\View
{
    private RenderParams $renderParams;

    public function getRenderParams(): RenderParams
    {
        if (empty($this->renderParams)) {
            $this->renderParams = new RenderParams();
        }

        return $this->renderParams;
    }

    public function init(): void
    {
        parent::init();
        $this->renderParams = new RenderParams();
    }

    /**
     * @param $view
     * @param array|RenderParams $params
     * @param $context
     * @return string
     */
    public function render($view, $params = [], $context = null): string
    {
        if ($params instanceof RenderParams) {
            $params = $params->get($view);
        }
        return parent::render($view, $params, $context);
    }

    /**
     * @param $view
     * @param array|RenderParams $params
     * @param $context
     * @return string
     */
    public function renderAjax($view, $params = [], $context = null): string
    {
        if ($params instanceof RenderParams) {
            $params = $params->get($view);
        }
        return parent::renderAjax($view, $params, $context);
    }
}