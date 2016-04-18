<?php

namespace App\Controllers;

use App\Components\Controller;
use App\Components\View;
use Micro\Web\Html\Html;

class DefaultController extends Controller
{
    public function filters()
    {
        return [
            [
                'class' => '\Micro\Filter\AccessFilter',
                'actions' => ['index'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['index'],
                        'users' => ['@'],
                        'message' => 'Only for not authorized!'
                    ]
                ]
            ],
            [
                'class' => '\Micro\Filter\CsrfFilter',
                'actions' => ['login']
            ],
            [
                'class' => '\Micro\Filter\XssFilter',
                'actions' => ['index', 'login', 'logout'],
                'clean' => '*'
            ]
        ];
    }

    public function actionIndex()
    {
        return new View($this->container);
    }

    public function actionError()
    {
        $result = null;
        /** @var \Micro\Base\Exception $error */
        if ($error = $this->container->request->post('error')) {
            $result .= Html::heading(3, $error->getMessage(), ['class' => 'text-danger bg-danger']);
        }
        $v = new View($this->container);
        $v->data = $result ?: 'undefined error';

        return $v;
    }
}
