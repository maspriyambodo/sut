<html>
    <head>
        <title>Print Preorder <?= $value[0]->no_po ?></title>
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/css/datatables.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/images/Logo/SANINDO_.jpg'); ?>" style="width:150px;"/>
                    </div>
                    <div class="form-group">
                        <p>Head Office: Jl. Tebet Barat XI No.8-9</p>
                        <p>Jakarta Selatan 12810</p>
                        <p>Phone: (021) 22837646</p>
                        <p>Email: generaladmin@sanindo.co.id</p>
                    </div>
                    <div class="form-group">
                        <label>Customer Name :</label>
                        <p><?= $value[0]->perusahaan ?></p>
                    </div>
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
                                    : <?= $value[0]->no_po ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Quotation Date
                                </td>
                                <td>
                                    : <?= $value[0]->tgl_po ?>
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
                                    $date = new DateTime($value[0]->tgl_po);
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
        </div>
    </body>
    <script>
        window.onload = function () {
            window.print();
        };
    </script>
</html>