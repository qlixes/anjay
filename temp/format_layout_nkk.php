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
    
            <div class="css_session_name">
            <div class="css_session_img">
                <img src="images/administrator.png" />
            </div>
            
            <div class="css_session_text">
                nkk            </div>
            
            <div class="css_session_border"></div>
            
            
		   
            <div class="css_session_border"></div>
            
            <a href="home.php" class="css_link">
            <div class="css_home_button" align="center">
                <div class="css_home_text">
                    HOME
                </div>
            </div>
            </a>
            
            <div class="css_session_border"></div>
            
            <a href="logout.php" class="css_link">
            <div class="css_logout_button" align="center">
                <div class="css_logout_text">
                    LOGOUT
                </div>
            </div>
            </a>
            
            <div style="clear:both"></div>
        </div>
            
    
    <div class="css_header_text">
    	Human Resource Development
    </div>
</div>
<div class="css_menu_body" align="center"><div class="css_menu_panel" style="width:1075px"><div class="css_panel_header" style="padding-left:20px">Module</div><div class="css_panel_content" style="padding-left:10px; padding-bottom:0px">		<a href="pg_karyawan.php" class="css_link">
			<div class="css_menu_icon" align="center">
				<img src="images/user_accounts.png" />
				<div class="css_menu_icon_text">
					Module Data Karyawan
				</div>
			</div>
		</a>
		<a href="pg_cuti.php" class="css_link">
			<div class="css_menu_icon" align="center">
			   <img src="images/kcmdrkonqi.png" />
			   <div class="css_menu_icon_text">
				  Module Cuti
			   </div>
			</div>
		</a>
				<a href="pg_jjkk.php" class="css_link">
					<div class="css_menu_icon" align="center">
						<img src="images/chronologicalreview.png" />
						<div class="css_menu_icon_text">
							Module Input Jadwal Shift
						</div>
					</div>
				</a>
	            	<a href="pg_training.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/training.png" />
	                        <div class="css_menu_icon_text">
	                            Module Training
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_admin.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/keychain_access.png" />
	                        <div class="css_menu_icon_text">
	                            Module Hak Akses
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_transport.php" class="css_link">
	                	<div class="css_menu_icon" align="center">
	                        <img src="images/money.png" />
	                        <div class="css_menu_icon_text">
	                            Module Transport Karyawan
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_uangmakan_tambahan.php" class="css_link">
	                	<div class="css_menu_icon" align="center">
	                        <img src="images/money.png" />
	                        <div class="css_menu_icon_text">
	                            Module Uang Makan Tambahan
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_rapel_lembur.php" class="css_link">
	                	<div class="css_menu_icon" align="center">
	                        <img src="images/money.png" />
	                        <div class="css_menu_icon_text">
	                            Module Rapel Lembur
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_insentif.php" class="css_link">
	                	<div class="css_menu_icon" align="center">
	                        <img src="images/money.png" />
	                        <div class="css_menu_icon_text">
	                            Module Insentif
	                        </div>
	                    </div>
	                </a>
					 <a href="pg_pengembalian.php" class="css_link">
						<div class="css_menu_icon" align="center">
							<img src="images/money.png" />
							<div class="css_menu_icon_text">
							   Module Pengembalian
							</div>
						</div>
					 </a>
					 <a href="pg_pengecualian_uangmakan.php" class="css_link">
						<div class="css_menu_icon" align="center">
							<img src="images/money.png" />
							<div class="css_menu_icon_text">
							   Module Pengecualian Uang
							</div>
						</div>
					 </a>
					 <a href="pg_tambahan_gaji.php" class="css_link">
						<div class="css_menu_icon" align="center">
							<img src="images/money.png" />
							<div class="css_menu_icon_text">
							   Module Tambahan Gaji
							</div>
						</div>
					 </a>
					 <a href="pg_ganti_password.php" class="css_link">
						<div class="css_menu_icon" align="center">
							<img src="images/keychain_access.png" />
							<div class="css_menu_icon_text">
							   Module Ganti Password
							</div>
						</div>
					 </a>
<div class="css_menu_clear"></div></div></div><div class="css_menu_panel" style="width:1075px"><div class="css_panel_header" style="padding-left:20px">Master</div><div class="css_panel_content" style="padding-left:10px; padding-bottom:0px">	            	<a href="pg_shift.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/chronologicalreview.png" />
	                        <div class="css_menu_icon_text">
	                            Master Shift
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_gaji_mingguan.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/money.png" />
	                        <div class="css_menu_icon_text">
	                            Gaji UMR
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_uangmakan.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/uang_makan.png" />
	                        <div class="css_menu_icon_text">
	                            Master Uang Makan
	                        </div>
	                    </div>
	                </a>
	              	<a href="pg_organisasi.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/binarytree.png" />
	                        <div class="css_menu_icon_text">
	                            Master Organisasi
	                        </div>
	                    </div>
	                </a>
	            	<a href="pg_kota.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/companies.png" />
	                        <div class="css_menu_icon_text">
	                            Master Kota - Propinsi
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_jamsostek.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/ambulance.png" />
	                        <div class="css_menu_icon_text">
	                            Master Jamsostek
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_marital.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/family.png" />
	                        <div class="css_menu_icon_text">
	                            Master Marital
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_form_libur_nasional.php" class="css_link">
	                	<div class="css_menu_icon" align="center">
	                        <img src="images/holiday.png" />
	                        <div class="css_menu_icon_text">
	                            Master Libur Nasional
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_puasa.php" class="css_link">
	                	<div class="css_menu_icon" align="center">
	                        <img src="images/puasa.png" />
	                        <div class="css_menu_icon_text">
	                            Master Puasa
	                        </div>
	                    </div>
	                </a>
	                <a href="pg_menu.php" class="css_link">
	                	<div class="css_menu_icon" align="center">
	                        <img src="images/menu.png" style="width:70px;height:70px"/>
	                        <div class="css_menu_icon_text">
	                            Master Menu
	                        </div>
	                    </div>
	                </a>
<div class="css_menu_clear"></div></div></div><div class="css_menu_panel" style="width:1075px"><div class="css_panel_header" style="padding-left:20px">Finger Print Module</div><div class="css_panel_content" style="padding-left:10px; padding-bottom:0px">	                <a href="pg_upload_file.php" class="css_link">
	                    <div class="css_menu_icon" align="center">
	                        <img src="images/fingerprint_reader.png" />
	                        <div class="css_menu_icon_text">
	                            Upload Finger Print
	                        </div>
	                    </div>
	                </a>
	            <a href="pg_browse_finger.php" class="css_link">
	                <div class="css_menu_icon" align="center">
	                	<img src="images/document.png" />
	                    <div class="css_menu_icon_text">
	                        Browse Finger Print
	                    </div>
	                </div>
	            </a>
<div class="css_menu_clear"></div></div></div><div class="css_menu_panel" style="width:1075px"><div class="css_panel_header" style="padding-left:20px">Report Module</div><div class="css_panel_content" style="padding-left:10px; padding-bottom:0px">	            <a href="pg_absen_overtime.php" class="css_link">
	                <div class="css_menu_icon" align="center">
	                	<img src="images/report.png" />
	                    <div class="css_menu_icon_text">
	                        Karyawan Overtime
	                    </div>
	                </div>
	            </a>

	            <a href="pg_absen_terlambat.php" class="css_link">
	                <div class="css_menu_icon" align="center">
	                	<img src="images/report.png" />
	                    <div class="css_menu_icon_text">
	                        Karyawan Terlambat
	                    </div>
	                </div>
	            </a>
	            <a href="pg_absen_mingguan.php" class="css_link">
	                <div class="css_menu_icon" align="center">
	                	<img src="images/report.png" />
	                    <div class="css_menu_icon_text">
	                        Total Absensi (Harian)
	                    </div>
	                </div>
	            </a>
	            <a href="pg_absen_bulanan.php" class="css_link">
	                <div class="css_menu_icon" align="center">
	                	<img src="images/report.png" />
	                    <div class="css_menu_icon_text">
	                        Total Absensi (Bulanan)
	                    </div>
	                </div>
	            </a>
			  <a href="pg_report_uangmakantambahan.php" class="css_link">
				<div class="css_menu_icon" align="center">
				    <img src="images/report.png" />
				    <div class="css_menu_icon_text">
					   Report Uang Makan Tambahan
				    </div>
				</div>
			 </a>
			  <a href="pg_report_transport.php" class="css_link">
				<div class="css_menu_icon" align="center">
				    <img src="images/report.png" />
				    <div class="css_menu_icon_text">
					   Report Transport
				    </div>
				</div>
			 </a>
	            <a href="pg_report_global.php" class="css_link">
	                <div class="css_menu_icon" align="center">
	                	<img src="images/report.png" />
	                    <div class="css_menu_icon_text">
	                        Report Global
	                    </div>
	                </div>
	            </a>
	            <a href="pg_report_pelatihan_karyawan.php" class="css_link">
	                <div class="css_menu_icon" align="center">
	                	<img src="images/report.png" />
	                    <div class="css_menu_icon_text">
	                        Report Pelatihan Karyawan
	                    </div>
	                </div>
	            </a>
<div class="css_menu_clear"></div></div></div></div>
<div class="css_footer" align="center">
	Netania Human Resource Development Dashboard 2019</div>