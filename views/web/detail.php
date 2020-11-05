<?php
use yii\helpers\html;
use yii\bootstrap\ActiveForm;
$this->title = $h_title;
?>

<div class="site-index">
	<div class="body-content">
		<div class="row">
			<div class="col-sm-4">
				<h2><?= $h_title; ?></h2>
				<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
				<div class="form-group">
					<?= $form->field($post, 'name')->textInput(['placeholder' => 'Your name']); ?>
			  	</div>
			  	<div class="form-group">
					<?= $form->field($post, 'email')->input('email', ['placeholder' => 'Your email']); ?>
			  	</div>
			  	<?php if($post['password'] == null || $post['password'] == ''): ?>
			  	<div class="form-group">
					<?= $form->field($post, 'password')->passwordInput(['placeholder' => 'Password']); ?>
			  	</div>
			  	<?php endif;?>
			  	<div class="form-group">
					<?= $form->field($model, 'image')->fileInput(); ?>
			  		<?php if($post->image != null || $post->image != ''): ?>
						<img src="<?= Yii::$app->params['upload_path'].'/'.$post->image;?>" alt="<?= $post->image;?>" width=50 height=50>
			  		<?php endif;?>
			  	</div>
			  	<div class="form-group">
			  		<?= Html::submitButton($b_title, ['class' => 'btn btn-primary']); ?>
			  		<?= Html::a('Go to home', ['/web'], ['class' => 'btn btn-link']); ?>
			  	</div>
			  	<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>