<?php
use yii\helpers\html;
use yii\helpers\url;
/* @var $this yii\web\View */
$this->title = 'YII2 CRUD Application';
?>
<div class="site-index">
    <?php if (Yii::$app->session->hasFlash('message')): ?>
    	<div class="alert alert success">
    		<?= yii::$app->session->getFlash('message'); ?>
    	</div>
	<?php endif; ?>

    <div class="jumbotron">
        <h1>YII2 CRUD Application Tutorial</h1>
    </div>
    <div class="body-content">
        <div class="row">
        	<?= Html::a('Create', ['/site/add'], ['class' => 'btn btn-success']) ?>
        	<table id="about-info-table" class="table table-hover">
		  		<thead>
				    <tr>
				      	<th scope="col">ID</th>
				      	<th scope="col">Title</th>
				      	<th scope="col" width="40%">Description</th>
				      	<th scope="col">Category</th>
				      	<th scope="col">Action</th>
				    </tr>
		  		</thead>
		  		<tbody>
		  			<?php if(count($posts) > 0): ?>
		  				<?php foreach($posts as $post):?>
						    <tr class="table-active">
						      	<th scope="row"><?= $post->id; ?></th>
						      	<td><?= $post->title; ?></td>
						      	<td><?= $post->description; ?></td>
						      	<td><?= $post->category; ?></td>
						      	<td>
						      		<span>
						      			<?php $url = Url::to(['/site/display', 'id' => $post->id]); ?>
						      			<?= Html::a('View', $url, ['class' => 'label label-primary'])?>
					      			</span>
						      		<span>
						      			<?= Html::a('Update', ['/site/modify', 'id' => $post->id], ['class' => 'label label-warning'])?>
						      		</span>
						      		<span>
					      				<?= Html::a('Delete', ['/site/remove', 'id' => $post->id], ['class' => 'label label-danger'])?>
					      			</span>
						      	</td>
						    </tr>
					    <?php endforeach; ?>
					<?php else: ?>
						<tr class="table-active">
					      	<td colspan="5">No records found!</td>
					    </tr>
				    <?php endif; ?>
		  		</tbody>
			</table>
        </div>
    </div>
</div>
