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
<div class="dashboard-section">

    <div class="section-header">

        <div>
            <h2>Transaksi Terbaru</h2>

            <p>
                Lima transaksi terakhir yang tercatat.
            </p>
        </div>

        <a href="<?= site_url('transaksi'); ?>" class="btn-primary">
            Lihat Semua
        </a>

    </div>


    <div class="table-container">

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Pembeli</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>

            </thead>


            <tbody>

                <?php if (!empty($transaksi_terbaru)): ?>

                    <?php foreach ($transaksi_terbaru as $item): ?>

                        <tr>

                            <td>
                                #<?= $item->id; ?>
                            </td>

                            <td>
                                <?= html_escape($item->nama_pembeli); ?>
                            </td>

                            <td>
                                Rp <?= number_format(
                                        $item->total,
                                        0,
                                        ',',
                                        '.'
                                    ); ?>
                            </td>

                            <td>
                                <?= html_escape($item->status); ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="4" class="empty-data">
                            Belum ada transaksi.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>