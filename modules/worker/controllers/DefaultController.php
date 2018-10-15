<?php

namespace app\modules\worker\controllers;

use app\models\User;
use yii\web\Controller;

/**
 * Default controller for the `worker` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->view->params['module'] = 'worker';
        return $this->render('index');
    }
}
