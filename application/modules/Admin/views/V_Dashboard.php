<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row tile_count">
    <div class="text-center">
        <h3>TAHUN <?= date("Y"); ?></h3>
    </div>
    <div class="col-md-4 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Customer</span>
        <div class="count"><?= $value[0]->total ?></div>
    </div>
    <div class="col-md-4 tile_stats_count">
        <span class="count_top"><i class="glyphicon glyphicon-shopping-cart"></i> Total transact</span>
        <div class="count"><?= $value[0]->totaltransaksi ?></div>
    </div>
    <div class="col-md-4 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Total income</span>
        <div class="count green" style="font-size:22px;"><?= number_format($value[0]->income) ?></div>
    </div>
</div>