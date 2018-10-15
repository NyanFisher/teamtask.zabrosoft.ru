<?php

namespace app\modules\project\controllers;

use yii\web\Controller;

/**
 * Default controller for the `project` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->view->params['module'] = 'project';
        return $this->render('index');
    }
}
