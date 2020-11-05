<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="body-content">
        <div class="row">
            <div class="col-sm-4">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(); ?>
                <div class="form-group">
                    <?= $form->field($post, 'email')->input('email', ['placeholder' => 'Your email']); ?>
                </div> 
                <div class="form-group"> 
                    <?= $form->field($post, 'password')->passwordInput(['placeholder' => 'Your password']) ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
