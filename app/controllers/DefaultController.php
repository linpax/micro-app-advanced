<?php

namespace App\controllers;

use App\components\Controller;
use App\components\View;
use Micro\web\Html;

class DefaultController extends Controller
{
    public function filters()
    {
        return [
            [
                'class' => '\Micro\filter\AccessFilter',
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
                'class' => '\Micro\filter\CsrfFilter',
                'actions' => ['login']
            ],
            [
                'class' => '\Micro\filter\XssFilter',
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
        /** @var \Micro\base\Exception $error */
        if ($error = $this->container->request->post('error')) {
            $result .= Html::heading(3, $error->getMessage(), ['class' => 'text-danger bg-danger']);
        }
        $v = new View($this->container);
        $v->data = $result ?: 'undefined error';

        return $v;
    }
}
