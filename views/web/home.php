<?php
use yii\helpers\html;
/* @var $this yii\web\View */
$this->title = 'Default controller change';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
	    	<?php
	    		if(yii::$app->session->hasFlash('message'))
	    			echo yii::$app->session->getFlash('message');
	    	?>
    		<h1>Person details</h1>	
    		<?= Html::a('Add', ['/web/add'], ['title' => 'Add detail', 'class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']);?>	
        	<table id="person-information" class="table table-bordered table-responsive table-hover">
		  		<thead>
				    <tr>
				      	<th scope="col">ID</th>
				      	<th scope="col">Image</th>
				      	<th scope="col">Name</th>
				      	<th scope="col">E-mail</th>
				      	<th scope="col">Create date</th>
				      	<th scope="col">Action</th>
				    </tr>
		  		</thead>
		  		<tbody>
		  			<?php if(count($posts) > 0):?>
		  				<?php foreach($posts as $post):?>
		  					<tr>
			  					<td><?= $post->id; ?></td>
			  					<td>
			  						<img src="<?= Yii::$app->params['upload_path'].'/'.$post->image;?>" 
			  						alt="<?= $post->image;?>" width=50 height=50>
			  					</td>
			  					<td><?= $post->name; ?></td>
			  					<td><?= $post->email; ?></td>
			  					<td><?= $post->created_at; ?></td>
			  					<td>
			  						<span>
		  								<?= Html::a('View', 
				  							['/web/view', 'id' => $post->id], 
				  							[
			  									'title' => 'View detail', 
			  									'class' => 'btn btn-sm btn-default'
		  									]
	  									); ?>
  									</span>
			  						<span>
			  							<?= Html::a('Update', 
			  								['/web/update', 'id' => $post->id], 
			  								[
		  										'title' => 'Update detail', 
		  										'class' => 'btn btn-sm btn-info'
  											]
  										); ?>
	  								</span>
			  						<span>
			  							<?= Html::a('Remove', 
			  								['/web/delete', 'id' => $post->id], 
		  									[
	  											'title' => 'Remove detail', 
	  											'class' => 'btn btn-sm btn-danger'
  											]
										); ?>
									</span>
			  					</td>
			  				</tr>	
		  				<?php endforeach;?>
		  			<?php else:?>
			  			<tr>
			  				<td colspan="6">No records found!</td>
			  			</tr>
		  			<?php endif;?>
		  		</tbody>
		  	</table>
        </div>
    </div>
</div>
