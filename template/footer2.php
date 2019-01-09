	<div class="navbar navbar-fixed-bottom navbar-footer">
	<div class="col-md-4 col-xs-2"></div>
	<div class="col-md-6 col-xs-8"><p class="navbar-text"><?= $label_app_copyright ?></a></p></div>
	<div class="col-md-4 col-xs-2"></div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= asset_url('js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= asset_url('js/bootstrap.min.js') ?>"></script>

	<script src="<?= asset_url('js/bootstrap3-typeahead.min.js') ?>"></script>

    <script src="<?= asset_url('js/pandu.js') ?>"></script>

    <script>
    	$(document).ready(function(){

			// $('#user_names').typeahead({
			//     source:  function (query, process) {
		 //        return $.post("<?= base_url('search_pdqa_user_json') ?>", { user_names: query }, function (data) {
		 //        		console.log(data);
		 //        		// data = $.parseJSON(data);
			//             return process(data);
			//         });
			//     }
			// });

			// $('#dept_name').typeahead({
			//     source:  function (query, process) {
		 //        return $.post("<?= base_url('hrd_dept_json') ?>", { dept_names: query }, function (data) {
		 //        		console.log(data);
		 //        		// data = $.parseJSON(data);
			//             return process(data);
			//         });
			//     }
			// });

			$('#empl_name').typeahead({
			    source:  function (query, process) {
		        return $.post("<?= base_url('hrd_employee_json') ?>", { empl_name: query }, function (data) {
		        		console.log(data);
		        		// data = $.parseJSON(data);
			            return process(data);
			        });
			    }
			});

    	});
    </script>
  </body>
</html>