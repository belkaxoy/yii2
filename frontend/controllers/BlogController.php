<?php

namespace frontend\controllers;

use common\models\Twits;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class BlogController extends Controller
{
    public $layout = 'blog.php';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $title = 'Сорокина Анастасия';
        return $this->render('index', [
            'caption' => $title
        ]);
    }

    public function actionList()
    {
        $twits = Twits::find()->all();

        return $this->render('list', [
            'twits' => $twits
        ]);
    }

    /**
     * @return Action
     */
    public function actionTwit($id)
    {
        $twit = Twits::find()->where(['id' => $id])->one();

        return $this->render('twit', [
            'twit' => $twit
        ]);
    }
}
