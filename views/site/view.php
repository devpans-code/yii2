 <?php
use yii\helpers\html;
/* @var $this yii\web\View */
$this->title = 'Create about';
?>
<div class="site-index">
	<h1>View about</h1>
	<div class="body-content">
		<ul class="list-group">
		  	<li class="list-group-item d-flex justify-content-between align-items-center">
		  		<?= $post->title; ?>
		  	</li>
		  	<li class="list-group-item d-flex justify-content-between align-items-center">
		  		<?= $post->description; ?>
		  	</li>
		  	<li class="list-group-item d-flex justify-content-between align-items-center">
		  		<?= $post->category; ?>
		  	</li>
		</ul>	
		<br>
		<a href="<?= Yii::$app->homeUrl;?>" class="btn btn-secondary">Back to home</a>
	</div>
</div>
