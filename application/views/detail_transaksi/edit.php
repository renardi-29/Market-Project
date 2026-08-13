<?php

/** @var object $detail */
/** @var array $produk */
/** @var array $transaksi */
?>
<div class="page-header">

    <div class="page-header-info">
        <h1>Edit Detail Transaksi</h1>

        <p>
            Ubah data detail transaksi.
        </p>
    </div>

</div>


<div class="form-container">

    <form
        action="<?= site_url(
                    'detail_transaksi/update/' . $detail->id
                ); ?>"
        method="post">

        <div class="form-group">

            <label for="transaksi_id">
                Transaksi
            </label>

            <select
                name="transaksi_id"
                id="transaksi_id"
                required>

                <?php foreach ($transaksi as $item): ?>

                    <option
                        value="<?= $item->id; ?>"
                        <?= ($detail->transaksi_id == $item->id)
                            ? 'selected'
                            : ''; ?>>
                        #<?= $item->id; ?>
                        - <?= html_escape(
                                isset($item->nama_pembeli) ? $item->nama_pembeli : ''
                            ); ?>
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

                <?php foreach ($produk as $item): ?>

                    <option
                        value="<?= $item->id; ?>"
                        <?= ($detail->produk_id == $item->id)
                            ? 'selected'
                            : ''; ?>>
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
                value="<?= $detail->jumlah; ?>"
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
                Update Detail
            </button>

        </div>

    </form>

</div>