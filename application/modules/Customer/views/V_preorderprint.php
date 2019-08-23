<html>
    <head>
        <title>Print Preorder <?= $value[0]->no_po ?></title>
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="all" type="text/css"/>
        <link href="<?= base_url('assets/css/datatables.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <style>
            @media screen{
                body{
                    display:none;
                }
            }
            @media print{
                @page {
                    size: A4 portrait;
                    margin: 0;
                }
                body {
                    font: 12pt Georgia, "Times New Roman", Times, serif;
                    line-height: 1.3;
                    margin: 0.1cm;
                }
            }
        </style>
    </head>
    <body onload="window.print();window.closed();">
        <div class="container">
            <div class="form-group text-right">
                
            </div>
            <div class="row">
                <div class="col-md-6" style="float:left;">
                    <div class="form-group">
                        <img src="<?= base_url('assets/images/Logo/SANINDO_.jpg'); ?>" style="width:150px;"/>
                    </div>
                    <div class="form-group">
                        <p>Head Office: Jl. Tebet Barat XI No.8-9, Jakarta Selatan 12810</p>
                        <p>Phone: (021) 22837646, Email: generaladmin@sanindo.co.id</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('assets/images/qrpo/' . $value[0]->perusahaan . '_' . $value[0]->no_po . '.png'); ?>" style="width:50px;float:right;"/>
                    <table class="table table-bordered" style="width:100%;float:left;">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase" colspan="2">
                                    Purchase Order
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label>Customer Name</label>
                                </td>
                                <td>
                                    : <?= $value[0]->perusahaan ?>
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
                                    PO Date
                                </td>
                                <td>
                                    : <?= $value[0]->tgl_po ?>
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <label class="text-uppercase">terbilang:</label><p><?php
                        $ppn = $value->total * 0.1;
                        echo ucwords(number_to_words($value->total + $ppn))
                        ?> Rupiah</p>
                </div>
            </div>
            <div class="form-group text-right">
                <p>Hormat Saya,</p>
                <p>PT. Sanindo Utama Traktor</p>
                <div style="clear:both;margin:100px;"></div>
                <p><u>( PRIYAMBODO )</u></p>
                <p>Direktur Utama</p>
            </div>
        </div>
        <i>* The information in this page is copyright to PT Sanindo Utama Traktor</i>
    </body>
</html>