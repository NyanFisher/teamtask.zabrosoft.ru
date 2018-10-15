<?php

namespace app\modules\team\controllers;

use yii\web\Controller;

/**
 * Default controller for the `team` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->view->params['module'] = 'team';
        return $this->render('index');
    }
}
