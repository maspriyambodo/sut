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
        <a href="<?= base_url('Admin/Preorder/Quotation/' . $value[0]->no_po . ''); ?>" class="btn btn-default"><i class="glyphicon glyphicon-list-alt"></i> Quotation</a>
        <a href="<?= base_url('Admin/Preorder/Cetak/' . $value[0]->no_po . ''); ?>" class="btn btn-default" target="_new"><i class="glyphicon glyphicon-print"></i> Print</a>
    </div>
</div>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class="text-uppercase text-center">
                nama<br>barang
            </th>
            <th class="text-uppercase text-center">
                qty
            </th>
            <th class="text-uppercase text-center">
                harga
            </th>
            <th class="text-uppercase text-center">
                total
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($value as $value) { ?>
            <tr>
                <td>
                    <?= $value->nama_barang ?>
                </td>
                <td class="text-center">
                    <?= $value->qty ?>
                </td>
                <td>
                    Rp. <?= number_format($value->harga); ?>
                </td>
                <td>
                    Rp. <?php
                    $a = $value->qty;
                    $b = $value->harga;
                    echo number_format($a * $b);
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-center text-uppercase">p p n</td>
            <td>
                <b>Rp. <?= number_format($value->total * 0.1); ?></b>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text-center text-uppercase">grand total</td>
            <td>

                <b>
                    Rp. <?php
                    $ppn = $value->total * 0.1;
                    echo number_format($value->total + $ppn);
                    ?>
                </b>
            </td>
        </tr>
    </tfoot>
</table>