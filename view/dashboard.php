<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Module</h3>
			  </div>
			  <div class="panel-body">
			  	<div class="row">
			  		<?php foreach($pages as $pages => $permission): ?>
			  			<?php if($pages): ?>
				  		<div class="col-xs-2 col-md-2">
				  			<a href="<?= base_url($pages) ?>" class="thumbnail">
				  				<img src="<?= asset_url('images/kcmdrkonqi.png') ?>" alt="">
				  				<?php $parser = "label_column_{$pages}" ?>
				  				<label><?= $$parser ?></label>
				  			</a>
				  		</div>
			  			<?php endif ?>
			  		<?php endforeach ?>
			  	</div>
			  </div>
			</div>
		</div>
	</div>
</div>