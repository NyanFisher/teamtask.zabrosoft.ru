<?php

namespace app\modules\profile\controllers;

use yii\web\Controller;

/**
 * Default controller for the `profile` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->view->params['module'] = 'profile';
        return $this->render('index');
    }
}
