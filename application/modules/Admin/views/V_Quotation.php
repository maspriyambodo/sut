<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center text-uppercase">no<br>quotation</th>
            <th class="text-center text-uppercase">tgl<br>quotation</th>
            <th class="text-center text-uppercase">no<br>preorder</th>
            <th class="text-center text-uppercase">tgl<br>preorder</th>
            <th class="text-center text-uppercase">nama<br>customer</th>
            <th class="text-center text-uppercase">nama<br>perusahaan</th>
            <th class="text-center text-uppercase">action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($value as $value) { ?>
            <tr>
                <td>
                    <?= $value->no_penawaran ?>
                </td>
                <td><?= $value->tgl_penawaran ?></td>
                <td><?= $value->no_po ?></td>
                <td><?= $value->tgl_po ?></td>
                <td><?= $value->nama ?></td>
                <td><?= $value->perusahaan ?></td>
                <td class="text-center">
                    <a href="<?= base_url('Admin/Quotation/Detail/' . $value->no_penawaran . ''); ?>" class="btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
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