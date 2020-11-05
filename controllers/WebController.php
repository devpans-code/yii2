<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Person;
use app\models\Upload;
use yii\web\UploadedFile;
/**
 * 
 */
class WebController extends Controller
{
	
	/**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

	public function actionIndex()
	{
		$post = Person::find()->all();
		return $this->render('home', ['posts' => $post]);
	}	

    public function actionAdd()
    {
        $post = new Person();
        $model = new Upload();
        $formData = yii::$app->request->post();
        if($formData && Yii::$app->request->isPost)
        {
            $formData['Person']['password'] = md5($formData['Person']['password']);
            $model->image = UploadedFile::getInstance($model, 'image');
            $formData['Person']['image'] = $model['image']->name;
            if($post->load($formData) && $post->save()){
                if ($model->upload())
                    Yii::$app->session->setFlash('message', 'Information store successfully!');
            }
            else
                Yii::$app->session->setFlash('message', 'Error occurs while processing!');
            return $this->redirect('index');
        }
        return $this->render('detail', ['h_title' => 'Add detail', 'b_title' => 'Add', 'post' => $post, 'model' => $model]);
    }

    public function actionView()
    {
        $id = yii::$app->request->get('id');
        //$post = Person::find()->where(['id' => $id])->all(); /* return data in form of array*/
        $post = Person::findOne(['id' => $id]);   // return data in form of object
        return $this->render('view', ['post' => $post]);
    }

    public function actionUpdate()
    {
        $id = yii::$app->request->get('id');    
        $post = Person::findOne(['id' => $id]);
        $model = new Upload();
        $updateForm = yii::$app->request->post();
        if($updateForm)
        {
            if($post->load($updateForm) && $post->save())
                yii::$app->session->setFlash('message', 'Information updated successfully!');
            else
                yii::$app->session->setFlash('message', 'Error occurs while processing');
            return $this->redirect('index');
        }
        return $this->render('detail', ['h_title'=>'Update detail', 'b_title'=>'Update', 'post' => $post, 'model' => $model]);
    }

    public function actionDelete()
    {
        $id = yii::$app->request->get('id');
        if(Person::findOne(['id' => $id])->delete())
            yii::$app->session->setFlash('message', 'Information deleted successfully!');
        else
            yii::$app->session->setFlash('message', 'Error occurs while processing');
        return $this->redirect('index');
    }

    public function actionLogin()
    {
        $post = new Person();
        if(Yii::$app->request->isPost)
        {
            $loginData = yii::$app->request->post();
            $model = Person::findOne([
                        'email' => $loginData['Person']['email'], 
                        'password' => md5($loginData['Person']['password'])
                    ]);
            if($model)
            {
                yii::$app->session->set('user', ['name' => $model->name, 'image' => $model->image]);
                yii::$app->session->setFlash('message', 'Login successfully!');
            }
            else
                yii::$app->session->setFlash('message', 'Error occurs while processing, try again!!');
            return $this->redirect('index');                        
        }
        return $this->render('login', ['post' => $post]);
    }

    public function actionLogout()
    {
        if(yii::$app->session->has('user'))
            yii::$app->session->destroy();
        return $this->redirect('login');
    }
}

?>