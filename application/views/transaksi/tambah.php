<?php

/** @var array $pembeli */
/** @var array $produk */
?>
<div class="page-header">

    <div class="page-header-info">

        <h1>Tambah Transaksi</h1>

        <p>
            Tambahkan transaksi baru ke Market Project.
        </p>

    </div>

</div>


<div class="form-container">

    <form
        action="<?= site_url('transaksi/simpan'); ?>"
        method="post">


        <div class="form-group">

            <label for="user_id">
                Pembeli
            </label>

            <select
                name="user_id"
                id="user_id"
                required>

                <option value="">
                    -- Pilih Pembeli --
                </option>

                <?php foreach ($pembeli as $item): ?>

                    <option value="<?= $item->id; ?>">

                        <?= html_escape($item->nama); ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label for="produk_id">
                Produk
            </label>

            <select
                name="produk_id"
                id="produk_id"
                required>

                <option value="">
                    -- Pilih Produk --
                </option>

                <?php foreach ($produk as $item): ?>

                    <option
                        value="<?= $item->id; ?>">

                        <?= html_escape($item->nama_produk); ?>
                        -
                        Rp <?= number_format(
                                $item->harga,
                                0,
                                ',',
                                '.'
                            ); ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label for="jumlah">
                Jumlah
            </label>

            <input
                type="number"
                name="jumlah"
                id="jumlah"
                min="1"
                value="1"
                required>

        </div>


        <div class="form-group">

            <label for="status">
                Status
            </label>

            <select
                name="status"
                id="status"
                required>

                <option value="pending">
                    Pending
                </option>

                <option value="diproses">
                    Diproses
                </option>

                <option value="selesai">
                    Selesai
                </option>

                <option value="dibatalkan">
                    Dibatalkan
                </option>

            </select>

        </div>


        <div class="form-actions">

            <a
                href="<?= site_url('transaksi'); ?>"
                class="btn-cancel">
                Batal
            </a>

            <button
                type="submit"
                class="btn-primary">
                Simpan Transaksi
            </button>

        </div>


    </form>

</div>