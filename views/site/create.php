<?php
use yii\helpers\html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
$this->title = $title;
?>
<div class="site-index">
	<div class="body-content">
		<h1><?= $title ?></h1>
		<?php $form = ActiveForm::begin(); ?>
		<div class="row">
			<div class="form-group">
		      	<div class="col-lg-6">
		        	<?= $form->field($post, 'title')->textInput(['placeholder' => 'Enter title']); ?>
		      	</div>
		    </div>
		</div>

		<div class="row">
			<div class="form-group">
		      	<div class="col-lg-6">
		        	<?= $form->field($post, 'description')->textarea(['row' => 6, 'placeholder' => 'Enter description']); ?>
		      	</div>
		    </div>
		</div>

		<div class="row">
			<div class="form-group">
		      	<div class="col-lg-6">
		        	<?= $form->field($post, 'category')->dropDownList([
	        		''=>'select', 
	        		'cms'=>'CMS', 
	        		'mvn'=>'MVC', 
	        		'ecommerce'=>'E-commerce'
	        	]); ?>
		      	</div>
		    </div>
		</div>  	

		<div class="row">
			<div class="form-group">
		      	<div class="col-lg-6">
		      		<div class="row">
			        	<div class="col-lg-3">
			        		<?= Html::submitButton($button, ['class' => 'btn btn-info']); ?>
			        	</div>
			        	<div class="col-lg-3">
			        		<a href="<?= Yii::$app->homeUrl;?>" class="btn btn-secondary">Back to home</a>
			        	</div>
		      		</div>
		      	</div>
		    </div>
		</div>
		<?php ActiveForm::end(); ?>
	</div>
</div>
