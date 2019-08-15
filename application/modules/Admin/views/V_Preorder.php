<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center text-uppercase">no<br>preorder</th>
            <th class="text-center text-uppercase">nama</th>
            <th class="text-center text-uppercase">nama<br>perusahaan</th>
            <th class="text-center text-uppercase">telp</th>
            <th class="text-center text-uppercase">mail</th>
            <th class="text-center text-uppercase">action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($value as $value) { ?>
            <tr>
                <td><?= $value->no_po ?></td>
                <td><?= $value->nama ?></td>
                <td class="text-center"><?= $value->perusahaan ?></td>
                <td class="text-center"><?= $value->telepon; ?></td>
                <td><?= $value->mail; ?></td>
                <td class="text-center">
                    <a href="<?= base_url('Admin/Preorder/Detail/' . $value->no_po . ''); ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>