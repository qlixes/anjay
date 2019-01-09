<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name = "description" content = "">
<meta name = "keywords" content = "">
<meta name = "author" content = "">
<meta name = "copyright" content = "">

<link rel="shortcut icon" href="images/icon.ico">

<link rel="stylesheet" href="style/header.css" type="text/css" media="screen" />

<link rel="stylesheet" href="style/footer.css" type="text/css" media="screen" />

<link rel="stylesheet" href="style/login.css" type="text/css" media="screen" />

<link rel="stylesheet" href="style/menu.css" type="text/css" media="screen" />

<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />

<title>Netania Human Resource Development Dashboard</title>
<script type="text/javascript">
	function imgChange1( img ) { document.back_button.src = img; }
</script>
<script src="scripts/jquery-1.4.3.min.js"></script>
<script src="scripts/datetimepicker_css.js"></script>

<script type="text/javascript" src="ajax/ajax.js"></script>

<!-- ===== FANCYBOX ===== -->

<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="style/fancy_style.css" />
<script type="text/javascript">
	$(document).ready(function() {
		$("a#ijin").fancybox({
			'width'			: 560,
			'height'		: 340,
			'overlayShow'	: true,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
		});
	});
	$(document).ready(function() {
		$("a#cuti").fancybox({
			'width'			: 560,
			'height'		: 340,
			'overlayShow'	: true,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
		});
	});
	$(document).ready(function() {
		$("a#ijin_bersama").fancybox({
			'width'			: 560,
			'height'		: 340,
			'overlayShow'	: true,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
		});
	});
	$(document).ready(function() {
		$("a#hak_libur").fancybox({
			'width'			: 560,
			'height'		: 340,
			'overlayShow'	: true,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
		});
	});
	$(document).ready(function() {
		$("a#puasa").fancybox({
			'width'			: 560,
			'height'		: 340,
			'overlayShow'	: true,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
		});
	});
</script>

<link rel="stylesheet" type="text/css" href="style/style_select.css" />
<script type='text/javascript' src='scripts/select_demo2.js'></script>

<div class="css_header">
	<div class="css_header_logo">
    	
    </div>
    
        
    
    <div class="css_header_text">
    	Human Resource Development Dashboard
    </div>
</div>

<body style="margin:0px">

	<div class="css_login_body" align="center">

        <div class="css_login_padding">
            <div class="css_login_panel" align="center">
            	<div class="css_login_tabel">

                	<div style="position:relative; top:0px">
                        <form name="login" method="post" action="login.php">
                            <table width="300px" class="css_login_tabel_in">
                              <tr>
                                <td style="padding:5px"><input type="text" name="user_admin" style="width:100%"  placeholder="User"></td>
                                <td style="padding:5px"><input type="password" name="pass_admin" style="width:100%"  placeholder="Password"></td>
                              </tr>
                              <tr>
                                <td colspan="2" style="padding:5px">
                                  <input type="submit" name="login" value="Login" style="width:100%" />
                                </td>
                              </tr>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

</body>

<div class="css_footer" align="center">
	Netania Human Resource Development Dashboard 2019</div>