<?php

namespace App\components;

use Micro\base\IContainer;
use Micro\mvc\controllers\ViewController as BaseController;

/**
 * Class Controller
 * @package App\components
 */
class Controller extends BaseController
{
    /**
     * Constructor controller
     *
     * @access public
     *
     * @param Container $container
     * @param string $modules
     *
     * @result void
     */
    public function __construct(IContainer $container, $modules = '')
    {
        parent::__construct($container, $modules);

        $this->layout = 'maket';
    }
}
