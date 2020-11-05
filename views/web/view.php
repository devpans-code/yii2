<?php

use yii\helpers\html;

?>
<div class="site-index">
	<div class="body-content">
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="<?= Yii::$app->params['upload_path'].'/'.$post->image;?>" alt="<?= $post->image; ?>">
  			<div class="card-body">
    			<h5 class="card-title"><?= $post->name; ?></h5>
    			<p class="card-text"><?= $post->email; ?></p>
    			<?= html::a('Go to home', ['/web'], ['class' => 'btn btn-link']); ?>
  			</div>
		</div>
	</div>
</div>