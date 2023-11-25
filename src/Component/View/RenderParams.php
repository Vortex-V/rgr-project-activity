<?php
declare(strict_types=1);

namespace App\Component\View;

/**
 * Позволяет передавать параметры во вложенные вызовы render на этапе контроллера
 * ```php
 *    // Controller $this
 *   $this->renderParams->set('_sample', ['sample' => 'text']);
 *   $this->render('index');
 * ```
 *
 * После может быть вызвано в представлении
 * ```php
 *    // View $this
 *    echo $this->render('_sample', $this->renderParams);
 * ```
 */
class RenderParams
{
    private array $params = [];

    public function set(string $view, array $params = []): void
    {
        if (array_key_exists($view, $this->params)) {
            $this->params[$view] = array_merge($this->params[$view], $params);
        } else {
            $this->params[$view] = $params;
        }
    }

    public function get($view): array
    {
        if (array_key_exists($view, $this->params)) {
            return $this->params[$view];
        }
        return [];
    }
}