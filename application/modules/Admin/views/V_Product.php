<form method="post" action="<?= base_url('Admin/Product/Simpan/'); ?>">
    <table class="table table-bordered table-hover table-striped" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">
                    name
                </th>
                <th class="text-center text-uppercase">
                    part<br>number
                </th>
                <th class="text-center text-uppercase">
                    stock
                </th>
                <th class="text-center text-uppercase">
                    price
                </th>
                <th class="text-center text-uppercase">
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">
                    <input type="text" name="name" class="form-control" required="" autocomplete="off" style="width:100%;">
                </td>
                <td class="text-center">
                    <input type="text" name="partnumber" class="form-control" required="" autocomplete="off" style="width:100%;">
                </td>
                <td class="text-center">
                    <input type="text" name="stock" class="form-control" required="" onkeypress="return isNumberKey(event)" autocomplete="off" style="width:100%;">
                </td>
                <td class="text-center">
                    <input type="text" name="price" class="form-control" required="" onkeypress="return isNumberKey(event)" autocomplete="off" style="width:100%;">
                </td>
                <td class="text-center">
                    <div class="form-group" style="margin-top:10px;">
                        <button type="submit" class="btn btn-default btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Save Product"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                    </div>
                </td>
            </tr>
            <tr>
                <?php foreach ($value as $value) { ?>
                    <td>
                        <?= $value->name ?>
                    </td>
                    <td>
                        <?= $value->partnumber ?>
                    </td>
                    <td class="text-center">
                        <?= $value->stock ?>
                    </td>
                    <td>
                        <?= number_format($value->price); ?>
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default btn-xs" onclick="Getdata(<?= $value->id ?>)" data-toggle="tooltip" data-placement="top" title="Edit Product"><i class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#Editmodal"></i></button>
                            <button type="button" class="btn btn-default btn-danger btn-xs" onclick="Del(<?= $value->id ?>)" data-toggle="tooltip" data-placement="top" title="Delete Product"><i class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#Deletemodal"></i></button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>
<div class="modal fade" id="Editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?= base_url('Admin/Product/Update/'); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idproduct">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-uppercase">Product Name :</label>
                                <input type="text" name="nameproduct" class="form-control" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-uppercase">part Number :</label>
                                <input type="text" name="partnumb" class="form-control" required="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-uppercase">Stock :</label>
                                <input type="text" name="stockb" class="form-control" required="" autocomplete="off" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="text-uppercase">Price :</label>
                                <input type="text" name="priceb" class="form-control" required="" autocomplete="off" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="Deletemodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('Admin/Product/Delete'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idc">
                    <p class="text-center">Are you sure you want to delete data ?</p>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-default btn-danger">Yes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    window.onload = function () {
        $('table').dataTable({});
    };
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    function Getdata(obj) {
        $('input[name=idproduct]').val(obj);
        $.ajax({
            url: "<?= base_url('Admin/Product/Getdata/') ?>" + obj,
            method: 'GET',
            success: function (data) {
                $('input[name=nameproduct]').val(data[0].name);
                $('input[name=partnumb]').val(data[0].partnumber);
                $('input[name=stockb]').val(data[0].stock);
                $('input[name=priceb]').val(data[0].price);
            },
            error: function (jqXHR) {
                alert(jqXHR.textStatus);
            }
        });
    }
    function Del(obj) {
        $('input[name=idc]').val(obj);
    }
</script>