<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center text-uppercase">no<br>preorder</th>
            <th class="text-center text-uppercase">nama<br>customer</th>
            <th class="text-center text-uppercase">nama<br>perusahaan</th>
            <th class="text-center text-uppercase">telp</th>
            <th class="text-center text-uppercase">mail</th>
            <th class="text-center text-uppercase">action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($value as $value) { ?>
            <tr>
                <td>
                    <?= $value->no_po ?>
                </td>
                <td>
                    <?= $value->nama ?>
                </td>
                <td>
                    <?= $value->perusahaan ?>
                </td>
                <td>
                    <?= $value->telepon ?>
                </td>
                <td>
                    <?= $value->mail ?>
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="<?= base_url('Admin/Preorder/Detail/' . $value->no_po . ''); ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Detail Preorder"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <?php
                            if ($value->pesan != '') {
                                echo '<a href="' . base_url('Admin/Preorder/Messagedetail/' . $value->no_po . '') . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Message"><i class="glyphicon glyphicon-envelope"></i></a>';
                            } else {
                                echo '';
                            }
                            ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    window.onload = function () {
        $('.table').dataTable({});
    };
</script>