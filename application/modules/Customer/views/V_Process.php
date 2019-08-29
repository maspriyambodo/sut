
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12 invoice-header">
            <h1>
                <img src="<?= base_url('assets/images/Logo/SANINDO_.png'); ?>" style="width:150px;"/>
                <small class="pull-right">Date: <?= date("Y-m-d"); ?></small>
            </h1>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>PT. SANINDO UTAMA TRAKTOR</strong>
                <br>Head Office: Jl. Tebet Barat XI No.8-9
                <br>Jakarta Selatan 12810
                <br>Phone: (021) 22837646
                <br>Email: generaladmin@sanindo.co.id
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong><?= $value[0]->nama ?></strong>
                <br><?= $value[0]->alamat_perusahaan ?>
                <br>Phone: <?= $value[0]->telepon ?>
                <br>Email: <?= $value[0]->mail ?>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice #<?= $value[0]->no_po ?></b>
            <br>
            <br>
            <b>Order ID:</b> <?= $value[0]->no_po ?>
            <br>
            <b>Payment Due:</b> <?php
            $date = new DateTime($value[0]->tgl_penawaran);
            $date->modify('+15 day');
            echo $date->format('d-m-Y');
            ?>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($value as $value) { ?>
                        <tr>
                            <td><?= $value->qty ?></td>
                            <td><?= $value->nama_barang ?></td>
                            <td><?= $value->partnumber ?></td>
                            <td>Rp. <?= number_format($value->price); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p class="lead">Payment Methods:</p>
            <img src="<?= base_url('assets/images/product/american-express.png'); ?>"/>
            <img src="<?= base_url('assets/images/product/mastercard.png'); ?>" alt=""/>
            <img src="<?= base_url('assets/images/product/paypal.png'); ?>" alt=""/>
            <img src="<?= base_url('assets/images/product/visa.png'); ?>" alt=""/>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">Amount Due 2/22/2014</p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>Rp. <?= number_format($value->total); ?></td>
                        </tr>
                        <tr>
                            <th>VAT 10%</th>
                            <td>Rp. <?= number_format($value->total * 0.1); ?></td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>Rp. <?php
                                $ppn = $value->total * 0.1;
                                echo number_format($value->total + $ppn);
                                ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
        </div>
    </div>
</section>