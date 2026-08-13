<div class="page-header">

    <div class="page-header-info">
        <h1>Detail Transaksi</h1>

        <p>
            Daftar detail produk dari setiap transaksi.
        </p>
    </div>

    <a href="#" class="btn-primary">
        + Tambah Detail
    </a>

</div>


<div class="table-container">

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Transaksi</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>


        <tbody>

            <?php if (!empty($detail_transaksi)): ?>

                <?php foreach ($detail_transaksi as $item): ?>

                    <tr>

                        <td>
                            <?= $item->id; ?>
                        </td>

                        <td>
                            #<?= $item->nomor_transaksi; ?>
                        </td>

                        <td>
                            <?= html_escape($item->nama_produk); ?>
                        </td>

                        <td>
                            <?= $item->jumlah; ?>
                        </td>

                        <td>
                            Rp <?= number_format(
                                    $item->harga,
                                    0,
                                    ',',
                                    '.'
                                ); ?>
                        </td>

                        <td>
                            Rp <?= number_format(
                                    $item->subtotal,
                                    0,
                                    ',',
                                    '.'
                                ); ?>
                        </td>

                        <td>

                            <a href="#" class="btn-edit">
                                Edit
                            </a>

                            <a href="#" class="btn-delete">
                                Hapus
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="7" class="empty-data">
                        Belum ada detail transaksi.
                    </td>

                </tr>

            <?php endif; ?>

        </tbody>

    </table>

</div>