<?php

namespace App\Controller;

use App\Component\View\View;
use App\Component\View\RenderParams;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Module;
use yii\web\Controller;

/**
 * @inheritDoc
 *
 * @property-read Module[] $modules All ancestor modules that this controller is located within.
 * @property-read string $route The route (module ID, controller ID and action ID) of the current request.
 * @property-read string $uniqueId The controller ID that is prefixed with the module ID (if any).
 * @property View $view The view object that can be used to render views or view files.
 * @property-read RenderParams $renderParams
 * @property string $viewPath The directory containing the view files for this controller.
 */
class BaseController extends Controller
{
    private ?View $_view = null;

    /**
     * @throws InvalidConfigException
     */
    protected function getRenderParams(): RenderParams
    {
        return $this->getView()->getRenderParams();
    }

    /**
     * @inheritDoc
     * @return View
     * @throws InvalidConfigException
     */
    public function getView(): View
    {
        if ($this->_view === null) {
            $this->_view = Yii::$app->get('view');
        }

        return $this->_view;
    }
}