<?php

namespace App\Components;

use Micro\Base\IContainer;
use Micro\Mvc\Controllers\ViewController as BaseController;

/**
 * Class Controller
 * @package App\Components
 */
class Controller extends BaseController
{
    /**
     * Constructor controller
     *
     * @access public
     *
     * @param IContainer $container
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
