<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">nama perusahaan</label>
            <p class="text-uppercase"><?= $value[0]->perusahaan; ?></p>
        </div>
        <div class="form-group">
            <label class="text-uppercase">no preorder</label>
            <p class="text-uppercase"><?= $value[0]->no_po; ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">nama karyawan</label>
            <p class="text-uppercase"><?= $value[0]->nama; ?></p>
        </div>
        <div class="form-group">
            <label class="text-uppercase">email</label>
            <p class="text-uppercase"><?= $value[0]->mail; ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">telepon</label>
            <p class="text-uppercase"><?= $value[0]->telepon; ?></p>
        </div>
        <div class="form-group">
            <label class="text-uppercase">tanggal po</label>
            <p class="text-uppercase"><?= $value[0]->tgl_po; ?></p>
        </div>
    </div>
</div>
<div class="form-group text-right">
    <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('Admin/Preorder/Message/' . $value[0]->no_po . ''); ?>" class="btn btn-default"><i class="glyphicon glyphicon-envelope"></i> Message</a>
        <a href="<?= base_url('Admin/Preorder/Cetak/' . $value[0]->no_po . ''); ?>" class="btn btn-default" target="_new"><i class="glyphicon glyphicon-print"></i> Print</a>
        <a href="<?= base_url('Admin/Preorder/Proses/' . $value[0]->no_po . ''); ?>" class="btn btn-default btn-success"><i class="glyphicon glyphicon-ok"></i> Process</a>
    </div>
</div>
