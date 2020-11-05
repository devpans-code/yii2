<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\About;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $post = About::find()->all();
        return $this->render('home', ['posts' => $post]);
    }

    public function actionCreate()
    {
        $post = new About();
        if($post->load(Yii::$app->request->post()) && $post->save())
        {
            Yii::$app->session->setFlash('message', 'Detail submitted successfully!');
            return $this->redirect(['index']);
        }
        return $this->render('create', ['title' => 'Create about', 'button' => 'Create about','post' => $post]);
    }

    public function actionView($id)
    {
        //  $sql = 'select title, category from about where id=:id';
        //  $post = About::findBySql($sql, [':id' => $id])->all();  
        //  $post = About::find()->where('id' => $id)->all();
        $post = About::findOne(['id' => $id]);
        if($post) 
            return $this->render('view', ['post' => $post]);
        else
            Yii::$app->session->setFlash('message', 'Please, enter valid id');
            return $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $post = About::findOne(['id' => $id]);
        if($post->load(Yii::$app->request->post()) && $post->save())
        {
            Yii::$app->session->setFlash('message', 'Detail updated successfully!');
            return $this->redirect(['index']);
        }
        return $this->render('create', ['title' => 'Update about', 'button' => 'Update about','post' => $post]);
    }

    public function actionDelete($id)
    {
        if(About::findOne(['id' => $id])->delete())
            Yii::$app->session->setFlash('message', 'Record deleted successfully!');
        else
            Yii::$app->session->setFlash('message', 'Error while deleting record!!');
        return $this->redirect(['index']);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
