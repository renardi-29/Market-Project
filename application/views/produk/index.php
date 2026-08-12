<main class="main-content">

    <div class="page-header">

        <div class="page-header-info">

            <h1>Produk</h1>

            <p>
                Daftar produk yang tersedia di Market Project.
            </p>

        </div>

        <a href="<?= site_url('produk/tambah'); ?>" class="btn-primary">
            + Tambah Produk
        </a>

    </div>


    <div class="table-container">

        <table>

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Nama Produk</th>

                    <th>Harga</th>

                    <th>Stok</th>

                    <th>Penjual</th>

                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody>

                <?php if (!empty($produk)): ?>

                    <?php foreach ($produk as $item): ?>

                        <tr>

                            <td>
                                <?= $item->id; ?>
                            </td>

                            <td>
                                <?= html_escape($item->nama_produk); ?>
                            </td>

                            <td>
                                Rp <?= number_format($item->harga, 0, ',', '.'); ?>
                            </td>

                            <td>
                                <?= $item->stok; ?>
                            </td>

                            <td>
                                <?= html_escape($item->nama_penjual); ?>
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

                        <td colspan="6" class="empty-data">
                            Belum ada produk.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</main>