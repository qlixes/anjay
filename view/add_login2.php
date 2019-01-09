<div class="container">
	<div class="row">
		<div class="col-md-3 col-xs-3"></div>
		<div class="col-md-6 col-xs-6">
			<form method="POST" action="<?= base_url('add_login') ?>">
				<div class="form-group">
					<label><?= $label_input_login_dept_id ?></label>
					<select data-live-search="true" class="selectpicker form-control" name="select_dept" id="select_dept">
						<?php foreach($list_hrd_dept as $hrd_dept): ?>
							<option value="<?= $hrd_dept['dept_id'] ?>"><?= $hrd_dept['dept_name'] ?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" name="select_dept_hidden" id="select_dept_hidden">
				</div>
				<div class="form-group">
					<label><?= $label_input_login_employee_id ?></label>
					<select data-live-search="true" class="selectpicker form-control" name="select_employee" id="select_employee">
						<?php foreach($list_hrd_empl as $hrd_empl): ?>
								<option value="<?= $hrd_empl['user_id'] ?>" data-id="<?= $hrd_empl['dept_id'] ?>"><?= $hrd_empl['name'] ?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" name="select_empl_hidden" id="select_empl_hidden">
				</div>
				<div class="form-group">
					<label><?= $label_input_login_user_name ?></label>
					<input type="text" class="form-control" name="user_name" placeholder="<?= $label_input_login_user_name ?>">
				</div>
				<div class="form-group">
					<label><?= $label_input_login_user_pass ?></label>
					<input type="text" class="form-control" name="user_pass" placeholder="<?= $label_input_login_user_pass ?>">
				</div>
				<div class="form-group">
					<?php foreach($list_module as $module): ?>
					<div class="col-md-6 col-xs-6">
						<div class="checkbox">
							<label><input type="checkbox" name="list_check[]" value="<?= $module['module_name'] ?>"><?= $module['module_label'] ?></label>
						</div>
					</div>
					<?php endforeach ?>
				</div>
				<button type="submit" class="btn btn-primary" name="save_add_login"><i class="fa fa-save"></i> <?= $label_btn_save ?></button>
			</form>
		</div>
		<div class="col-md-3 col-xs-3"></div>
	</div>
</div>