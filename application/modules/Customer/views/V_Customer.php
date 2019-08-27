<form action="<?= base_url('Customer/Customer/Simpan'); ?>" method="POST">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase">Nama customer :</label>
                <input type="text" name="namacust" class="form-control" required="" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="text-uppercase">Email :</label>
                <input type="email" name="mail" class="form-control" required="" autocomplete="off">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase">Nama perusahaan :</label>
                <input type="text" name="perusahaan" class="form-control" required="" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="text-uppercase">Alamat Perusahaan :</label>
                <textarea name="alamat" class="form-control" required=""></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase">telepon :</label>
                <input type="text" name="telepon" class="form-control" required="" autocomplete="off" onkeypress="return isNumberKey(event)">
            </div>
        </div>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th class="text-center text-uppercase">
                    product<br>name
                </th>
                <th class="text-center text-uppercase">
                    part<br>name
                </th>
                <th class="text-center text-uppercase">
                    stock
                </th>
                <th class="text-center text-uppercase">
                    price
                </th>
                <th class="text-center text-uppercase">
                    qty
                </th>
                <th class="text-center text-uppercase">
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($value as $value) { ?>
                <tr>
                    <td>
                        <?= $value->name; ?>
                    </td>
                    <td>
                        <?= $value->partnumber; ?>
                    </td>
                    <td>
                        <?= $value->stock; ?>
                    </td>
                    <td>
                        Rp. <?= number_format($value->price); ?>
                    </td>
                    <td class="text-center" id="<?= 'qty' . $value->id; ?>">

                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" id="<?= 'obat' . $value->id ?>" class="btn btn-xs btn-default" onclick="Tambah(<?= $value->id; ?>)" title="tambah product"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="btn btn-xs btn-default btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="batal pilih" onclick="Batal(<?= $value->id; ?>)"><i class="glyphicon glyphicon-remove"></i></button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="form-group" id="obt">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default btn-success"><i class="glyphicon glyphicon-save"></i> Simpan</button>
    </div>
</form>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    function Tambah(id) {
        $("<div style='clear:both;margin:10px 0px;'></div>").appendTo('#obt');
        $('<input type="hidden" id=' + 'obattxt' + id + ' name="idproduct[]" required="" value=' + id + '>').appendTo('#obt');
        $('<input type="text" id=' + 'qtytxt' + id + ' style="width:100%;" name="qty[]" value="0" autocomplete="off" class="form-control" onkeypress="return isNumberKey(event)">').appendTo('#qty' + id + '');
        document.getElementById('obat' + id + '').disabled = true;
    }
    function Batal(id) {
        document.getElementById("obattxt" + id + "").remove();
        document.getElementById("qtytxt" + id + "").remove();
        document.getElementById('obat' + id + '').disabled = false;
    }
    window.onload = function () {
        $('.table').dataTable({});
        $('[data-toggle="tooltip"]').tooltip();
    };
</script>