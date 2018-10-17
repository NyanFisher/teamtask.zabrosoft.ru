<?php
/**
 * Created by PhpStorm.
 * User: uCraft
 * Date: 16.10.2018
 * Time: 19:45
 */

namespace app\modules\team\models;

use yii\base\Model;

class NewTeamForm extends Model
{
    public $title;
    public $description;

    public function rules()
    {
        return [
            [['title'], 'required', 'message' => 'Это поле не может быть пустым.'],
            ['description', 'default', 'value' => 'Нет описания'],
            ['title', 'unique', 'targetClass' => '\app\modules\team\models\Team', 'message' => 'Команда с таким названием уже существует.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание'
        ];
    }

    public function saveTeam()
    {
        if (!$this->validate()){
            return null;
        }

        $saved = new Team();
        $saved->title = $this->title;
        $saved->description = $this->description;
        $saved->user_id = \Yii::$app->user->getId();
        $saved->date_at = date('Y-m-d');
        $saved->save();
    }
}