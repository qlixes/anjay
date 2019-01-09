<div class="container">
	<div class="row">
		<div class="col-md-4 col-xs-4"></div>
		<div class="col-md-4 col-xs-4">
			<form method="POST" action="<?= base_url('show_login') ?>">
				<div class="form-group">
					<label><?= $label_search_login ?></label>
					<select data-live-search="true" data-live-search-style="startsWith" class="form-control selectpicker" name="select_user" id="select_user">
					<?php foreach($data_login[1] as $data): ?>
						<option value="<?= $data['id'] ?>"><?= $data['user_name'] ?></option>
					<?php endforeach ?>
					</select>
					<input type="hidden" name="select_login_hidden" id="select_login_hidden">
				</div>
				<button type="submit" class="btn-block" type="submit" name="btn_search_login" value="btn_search_login"><i class="fa fa-search"></i> <?= $label_search_login ?></button>
			</form>
		</div>
		<div class="col-md-4 col-xs-4"></div>
	</div>
	<hr />
	<div class="row">
		<a class="btn btn-success" href="<?= base_url('add_login') ?>"><i class="fa fa-plus"></i> <?= $label_btn_new ?></a>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-2 col-xs-2"></div>
		<div class="col-md-8 col-xs-8"></div>
			<table class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<td><?= $label_column_no ?></td>
						<td><?= $label_column_username ?></td>
						<td><?= $label_column_dept_id ?></td>
						<td><?= $label_column_employee_id ?></td>
						<td><?= $label_column_module_login ?></td>
						<td><?= $label_column_module_standar_analisa ?></td>
						<td><?= $label_column_module_form_analisa ?></td>
						<td><?= $label_column_module_form_analisa_ro3 ?></td>
						<td><?= $label_column_module_report_analisa ?></td>
						<td><?= $label_column_module_report_analisa_ro3 ?></td>
						<td colspan="2"><?= $label_column_action ?></td>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach(join_array($data_login2[1]) as $data): ?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $data['user_name'] ?></td>
						<td><?= $data['department_name'] ?></td>
						<td><?= $data['employee_name'] ?></td>
						<td><input type="checkbox" <?= checkbox_state($data['module_master_user']) ?> disabled></td>
						<td><input type="checkbox" <?= checkbox_state($data['module_master_standar_analisa']) ?> disabled></td>
						<td><input type="checkbox" <?= checkbox_state($data['module_master_form_analisa']) ?> disabled></td>
						<td><input type="checkbox" <?= checkbox_state($data['module_master_form_analisa_ro3']) ?> disabled></td>
						<td><input type="checkbox" <?= checkbox_state($data['module_report_analisa']) ?> disabled></td>
						<td><input type="checkbox" <?= checkbox_state($data['module_report_analisa_ro3']) ?> disabled></td>
						<td>
							<div class="form-group">
								<a class="btn btn-primary btn-block" href="<?= base_url('add_login') ?>?id=<?= $data['id'] ?>"><i class="fa fa-pencil"></i> <?= $label_btn_edit ?></a>
								<a class="btn btn-danger btn-block" href="<?= base_url('delete_login') ?>?id=<?= $data['id'] ?>"><i class="fa fa-trash"></i> <?= $label_btn_delete ?></a>
							</div>
						</td>
					</tr>
				<?php $i++ ?>
				<?php endforeach ?>
				</tbody>
			</table>
		<div>
		<div class="col-md-2 col-xs-2"></div>
	</div>
</div>