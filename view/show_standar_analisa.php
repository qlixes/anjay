<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-xs-4"></div>
		<div class="col-md-4 col-xs-4">
			<form method="POST" action="<?= base_url('module_master_standar_analisa') ?>">
				<div class="form-group">
					<label><?= $label_search_analisa ?></label>
					<select data-live-search="true" data-live-search-style="startsWith" class="form-control selectpicker" name="select_user">
					<?php foreach($data_standar_analisa as $data): ?>
						<option value="<?= $data['id'] ?>"><?= $data['standar_analisa_item'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
				<button type="submit" class="btn btn-success btn-block" type="submit" name="btn_search_analisa" value="<?= $btn_search_login ?>"><i class="fa fa-search"></i> <?= $label_btn_search ?></button>
				<a class="btn btn-primary btn-block" href="<?= base_url('module_master_user') ?>"><i class="fa fa-refresh"></i> <?= $label_btn_refresh ?></a>
			</form>
		</div>
		<div class="col-md-4 col-xs-4"></div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-4 col-xs-4">
			<a class="btn btn-success" href="<?= base_url('add_standar_analisa') ?>"><i class="fa fa-plus"></i> <?= $label_btn_new ?></a>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<table class="table table-hover table-bordered table-responsive">
				<thead>
					<tr>
						<th rowspan="2"><?= $label_column_no ?></td>
						<th rowspan="2"><?= $label_standar_analisa_items ?></td>
						<?php foreach($data_standar_analisa_items as $standar_analisa_items): ?>
							<th colspan="2"><?= $standar_analisa_items ?></td>
						<?php endforeach ?>
						<th colspan="2" rowspan="2"><?= $label_column_action ?></th>
					</tr>
					<tr>
						<?php foreach($data_standar_analisa_items as $standar_analisa_items): ?>
							<th><?= $label_standar_analisa_min ?></td>
							<th><?= $label_standar_analisa_max ?></td>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach($data_standar_analisa as $standar_analisa): ?>
						<tr>
							<td><?= $i ?></td>
							<td><?= $standar_analisa['standar_analisa_item'] ?></td>
							<?php foreach($data_standar_analisa_items_size as $standar_analisa_items_size): ?>
								<td><?= $standar_analisa[$standar_analisa_items_size] ?></td>
							<?php endforeach ?>
							<td>
								<a class="btn btn-primary btn-block" href="<?= base_url('add_standar_analisa') ?>?id=<?= $data['id'] ?>"><i class="fa fa-pencil"></i> <?= $label_btn_edit ?></a>
								<a href="<?= base_url('delete_standar_analisa') ?>?id=<?= $data['id'] ?>" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> <?= $label_btn_delete ?></a>
							</td>
						</tr>
					<?php $i++ ?>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>