<div class="page-header">

    <div class="page-header-info">

        <h1>Transaksi</h1>

        <p>
            Daftar transaksi Market Project.
        </p>

    </div>

    <a href="<?= site_url('transaksi/tambah'); ?>"
        class="btn-primary">
        + Tambah Transaksi
    </a>

</div>


<div class="table-container">

    <table>

        <thead>

            <tr>

                <th>ID</th>
                <th>Pembeli</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>


        <tbody>

            <?php if (!empty($transaksi)): ?>

                <?php foreach ($transaksi as $item): ?>

                    <tr>

                        <td>
                            <?= $item->id; ?>
                        </td>

                        <td>
                            <?= html_escape($item->nama_pembeli); ?>
                        </td>

                        <td>
                            <?= date('d-m-Y H:i', strtotime($item->tanggal)); ?>
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

                        <td>

                            <a
                                href="<?= site_url('transaksi/edit/' . $item->id); ?>"
                                class="btn-edit">
                                Edit
                            </a>

                            <a
                                href="<?= site_url('transaksi/hapus/' . $item->id); ?>"
                                class="btn-delete"
                                onclick="return confirm('Yakin ingin menghapus transaksi ini?');">
                                Hapus
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="6" class="empty-data">
                        Belum ada transaksi.
                    </td>

                </tr>

            <?php endif; ?>

        </tbody>

    </table>

</div>