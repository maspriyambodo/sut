<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <select class="form-control" onchange="Tahun()" name="tahun">
                <option value="">PILIH TAHUN LAPORAN</option>
                <?php foreach ($year as $year) { ?>
                    <option value = "<?= $year->tahun ?>"><?= $year->tahun ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class = "col-md-4">

    </div>
    <div class = "col-md-4">

    </div>
</div>
<table class="table table-bordered table-hover table-striped" style="width:100%;">
    <thead>
        <tr>
            <th class="text-center text-uppercase">
                nama<br>Customer
            </th>
            <th class="text-center text-uppercase">
                nama<br>Perusahaan
            </th>
            <th class="text-center text-uppercase">
                no<br>preorder
            </th>
            <th class="text-center text-uppercase">
                amount
            </th>
            <th class="text-center text-uppercase">
                action
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($value as $value) { ?>
            <tr>
                <td><?= $value->nama ?></td>
                <td><?= $value->perusahaan ?></td>
                <td><?= $value->no_po ?></td>
                <td>Rp. <?= number_format($value->amount) ?></td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="<?= base_url('Admin/Report/Detail/' . $value->id_customer . ''); ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <div class="panel panel-info">
        <div class="panel-body">
            <div class="form-group">
                <label class="text-uppercase">total income <?= $this->uri->segment(4); ?></label>
                <p><?= number_format($value->amount) ?></p>
            </div>
        </div>
    </div>
</table>
<script>
    window.onload = function () {
        $('table').dataTable({

        });
    };
    function Tahun() {
        var year = $('select[name=tahun]').val();
        window.location.href = "<?= base_url('Admin/Report/index/') ?>" + year;
    }
</script>