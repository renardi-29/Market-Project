<?php

/** @var int $total_produk */
/** @var int $total_transaksi */
/** @var int $total_penjual */
/** @var int $total_pembeli */
?>
<div class="page-header">

    <div class="page-header-info">

        <h1>Dashboard</h1>

        <p>
            Ringkasan data Market Project.
        </p>

    </div>

</div>


<div class="dashboard-grid">

    <div class="dashboard-card">

        <div class="dashboard-card-title">
            Total Produk
        </div>

        <div class="dashboard-card-value">
            <?= $total_produk; ?>
        </div>

    </div>


    <div class="dashboard-card">

        <div class="dashboard-card-title">
            Total Transaksi
        </div>

        <div class="dashboard-card-value">
            <?= $total_transaksi; ?>
        </div>

    </div>


    <div class="dashboard-card">

        <div class="dashboard-card-title">
            Total Penjual
        </div>

        <div class="dashboard-card-value">
            <?= $total_penjual; ?>
        </div>

    </div>


    <div class="dashboard-card">

        <div class="dashboard-card-title">
            Total Pembeli
        </div>

        <div class="dashboard-card-value">
            <?= $total_pembeli; ?>
        </div>

    </div>

</div>