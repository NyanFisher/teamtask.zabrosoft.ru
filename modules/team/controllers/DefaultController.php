<?php

namespace app\modules\team\controllers;

use app\modules\team\models\Team;
use yii\web\Controller;
use app\modules\team\models\NewTeamForm;

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

    public function actionNew()
    {
        $this->view->params['module'] = 'team';

        $form_data = new NewTeamForm();

        if (\Yii::$app->request->isPost){
            if ($form_data->load(\Yii::$app->request->post())){
                if ($team = $form_data->saveTeam()){
                    return $this->redirect('index');
                }
            }
        }

        return $this->render('new',[
            'form_data' => $form_data,
        ]);
    }
}
