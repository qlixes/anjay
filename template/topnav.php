<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img alt="brand" src="<?= asset_url('images/header_logo.png') ?>" ></a>
      <p class="navbar-brand navbar-right app-name"><?= $label_app_name ?></p>
    </div>
    <div class="container">
      <div class="row">
        <ul class="nav nav-tabs navbar-right" role="navigation">
          <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-home"></i> <?= $label_btn_home ?></a></li>
          <li><a href="<?= base_url('logout') ?>"><i class="fa fa-sign-out"></i> <?= $label_btn_logout ?></a></li>
        </ul>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</nav>