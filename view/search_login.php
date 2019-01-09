<div class="container">
  <div class="row">
    <form name="form_search_user" method="post" action="<?= base_url('report_master_login') ?>">
      <div class="form-group">
        <label><?= $label_search_user ?></label>
        <input type="text" class="form-control" name="" placeholder="Search">
      </div>
      <input type="submit" name="btn_search_login" value="<?= $label_btn_search ?>">
    </form>
  </div>
</div>