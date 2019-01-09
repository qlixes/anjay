	<div class="navbar navbar-fixed-bottom navbar-footer">
	<div class="col-md-4 col-xs-2"></div>
	<div class="col-md-6 col-xs-8"><p class="navbar-text"><?= $label_app_copyright ?></a></p></div>
	<div class="col-md-4 col-xs-2"></div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= asset_url('js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= asset_url('js/bootstrap.min.js') ?>"></script>

	<script src="<?= asset_url('js/bootstrap-select.js') ?>"></script>

	<script src="<?= asset_url('js/jquery.cascadingdropdown.min.js') ?>"></script>

	<script>
		$(document).ready(function() {

			$('#select_dept_hidden').val($('#select_dept').find(':selected').text());
			$('#select_empl_hidden').val($('#select_employee').find(':selected').text());

			$('#select_dept').change(function () {

	            // var data = $("#select_employee").find("option[data-id=" + $(this).val() + "]");
	            var data = $("#select_employee").find("option[data-id=" + $(this).val() + "]");

	            $('#select_dept_hidden').val($(this).find(':selected').text());

	            $('#select_employee').selectpicker('val', data.val());
	            $('.selectpicker').selectpicker('refresh')
	    	});

	    	$('#select_employee').change(function() {
	    		$('#select_empl_hidden').val($(this).find(':selected').text());
	    	});

		});
	</script>

  </body>
</html>