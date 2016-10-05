<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Twits;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'blog.php';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create-twit', 'index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['create-time-twit', 'index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $title = 'Административная панель';
        return $this->render('index',[
            'caption' => $title
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionCreateTwit() {

        $twit = new Twits();

        $post = Yii::$app->request->post("Twits");
        if(count($post)) {
            $twit->text = $post['text'];
            $twit->image = $post['image'];

            if ($twit->save()) {
                $twit = new Twits();
            }
        }

        return $this->render("create-twit",[
            'twit' => $twit
        ]);
    }

    public function actionCreateTimeTwit() {

        $twit = new Twits();
        date_default_timezone_set('Europe/Moscow');
        $message = 'Не удалось добавить твит';
        $success = false;

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $curr_time = date('H:i:s');
            $twit->text = $curr_time;

            if ($twit->save()) {
                $message = 'Твит был добавлен в '.$curr_time;
                $success = true;
                $twit = new Twits();
            }
        }

        return $this->render("create-time-twit", [
            'twit' => $twit,
            'message' => $message,
            'success' => $success
        ]);
    }
}
