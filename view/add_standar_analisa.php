<div class="container">
    <div class="row">
        <div class="col-md-1 col-xs-1"></div>
        <div class="col-md-10 col-xs-10">
        <form method="POST" action="<?= base_url('add_standar_analisa') ?>">
            <div class="form-group">
                <label><?= $label_input_standar_analisa_items ?></label>
                <input type="text" class="form-control" name="standar_analisa_item" autocomplete="off" placeholder="<?= $label_input_standar_analisa_items ?>">
            </div>
            <div class="form-group">
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $label_standar_analisa_subtitle ?></div>
                    <div class="panel-body">
                        <div class="row">
                        <?php foreach($data_standar_analisa_items as $standar_analisa): ?>
                            <div class="col-md-2 col-xs-3">
                                <label><?= $standar_analisa ?></label>
                                <?php $parser1 = strtolower("{$standar_analisa}_max") ?>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-toggle-up"></i></span>
                                    <input type="number" step="0.01" class="form-control" placeholder="0.00" name="<?= $parser1 ?>">
                                </div>
                                <?php $parser2 = strtolower("{$standar_analisa}_min") ?>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-toggle-down"></i></span>
                                    <input type="number" step="0.01" class="form-control" placeholder="0.00" name="<?= $parser2 ?>">
                                </div>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="save_add_analisa" value="save_add_analisa"><i class="fa fa-save"></i> <?= $label_btn_save ?></button>
            <a class="btn btn-warning" href="<?= base_url('module_master_standar_analisa') ?>"><i class="fa fa-mail-reply"></i> <?= $label_btn_back ?></a>
        </form>
        </div>
        <div class="col-md-1 col-xs-1"></div>
    </div>
</div>