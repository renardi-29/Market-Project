<?php

/** @var array $produk */
/** @var array $transaksi */
?>
<div class="page-header">

    <div class="page-header-info">
        <h1>Tambah Detail Transaksi</h1>

        <p>
            Tambahkan produk ke dalam transaksi.
        </p>
    </div>

</div>


<div class="form-container">

    <form
        action="<?= site_url('detail_transaksi/simpan'); ?>"
        method="post">

        <div class="form-group">

            <label for="transaksi_id">
                Transaksi
            </label>

            <select
                name="transaksi_id"
                id="transaksi_id"
                required>

                <option value="">
                    -- Pilih Transaksi --
                </option>

                <?php foreach ($transaksi as $item): ?>

                    <option value="<?= $item->id; ?>">
                        #<?= $item->id; ?>
                        - <?= html_escape(!empty($item->nama_pembeli) ? $item->nama_pembeli : ''); ?>
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

                    <option value="<?= $item->id; ?>">
                        <?= html_escape($item->nama_produk); ?>
                        - Rp <?= number_format(
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
                required>

        </div>


        <div class="form-actions">

            <a
                href="<?= site_url('detail_transaksi'); ?>"
                class="btn-cancel">
                Batal
            </a>

            <button
                type="submit"
                class="btn-primary">
                Simpan Detail
            </button>

        </div>

    </form>

</div>