<div class="container">
	<div class="row">
		<div class="col-md-3 col-xs-3"></div>
		<div class="col-md-6 col-xs-6">
			<form method="POST" action="<?= base_url('show_login') ?>">
				<div class="form-group">
					<label><?= $label_search_login ?></label>
					<select data-live-search="true" data-live-search-style="startsWith" class="form-control selectpicker" name="select_user">
					<?php foreach($data_login as $data): ?>
						<option value="<?= $data['id'] ?>"><?= $data['user_name'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
				<input class="btn-block" type="submit" name="form_search_login" value="<?= $label_search_login ?>"/>
			</form>
		</div>
		<div class="col-md-3 col-xs-3"></div>
	</div>
	<hr />
	<div class="row">
		<a class="btn btn-success" href="<?= base_url('add_standar_analisa') ?>"><i class="fa fa-plus"></i> <?= $label_btn_new ?></a>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<td rowspan="2"><?= $label_column_no ?></td>
						<td rowspan="2"><?= $label_standar_analisa_items ?></td>
						<?php foreach($data_standar_analisa_items as $standar_analisa_items): ?>
							<td colspan="2"><?= $standar_analisa_items ?></td>
						<?php endforeach ?>
					</tr>
					<tr>
						<?php foreach($data_standar_analisa_items as $standar_analisa_items): ?>
							<td><?= $label_standar_analisa_min ?></td>
							<td><?= $label_standar_analisa_max ?></td>
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
								<td><input type="number" step="0.01" class="form-control" id="<?= $standar_analisa[$standar_analisa_items_size] ?>" value="<?= $standar_analisa[$standar_analisa_items_size] ?>"></td>
							<?php endforeach ?>
						</tr>
					<?php $i++ ?>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>