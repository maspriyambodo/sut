<div class="row">
    <div class="col-md-6">
        <a href="<?= base_url('Admin/Quotation/Cetak/'); ?>"></a>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th class="text-center text-uppercase" colspan="2">
                        Quotation
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Quotation Number
                    </td>
                    <td>
                        : <?= $value[0]->no_penawaran ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Quotation Date
                    </td>
                    <td>
                        : <?php
                        $date = date_create($value[0]->tgl_penawaran);
                        echo date_format($date, "d-m-Y");
                        ?> 
                    </td>
                </tr>

                <tr>
                    <td>
                        PO Number
                    </td>
                    <td>
                        : <?= $value[0]->no_po ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Validity
                    </td>
                    <td>
                        : <?php
                        $date = new DateTime($value[0]->tgl_penawaran);
                        $date->modify('+15 day');
                        echo $date->format('d-m-Y');
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<table class="table table-bordered table-hover table-striped" style="width:100%;">
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
                    Rp. <?= number_format($value->price); ?>
                </td>
                <td>
                    Rp. <?php
                    $a = $value->qty;
                    $b = $value->price;
                    echo number_format($a * $b);
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-center text-uppercase">VAT 10%</td>
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