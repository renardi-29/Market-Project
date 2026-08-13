<?php

/** @var object $transaksi */
/** @var object $detail */
/** @var array $pembeli */
/** @var array $produk */
?>


<div class="page-header">

    <div class="page-header-info">

        <h1>Edit Transaksi</h1>

        <p>
            Ubah data transaksi.
        </p>

    </div>

</div>


<div class="form-container">

    <form
        action="<?= site_url('transaksi/update/' . $transaksi->id); ?>"
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

                    <option
                        value="<?= $item->id; ?>"
                        <?= ($transaksi->user_id == $item->id)
                            ? 'selected'
                            : ''; ?>>

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
                        value="<?= $item->id; ?>"
                        <?= ($detail->produk_id == $item->id)
                            ? 'selected'
                            : ''; ?>>

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
                value="<?= $detail->jumlah; ?>"
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

                <option
                    value="pending"
                    <?= ($transaksi->status == 'pending')
                        ? 'selected'
                        : ''; ?>>
                    Pending
                </option>

                <option
                    value="diproses"
                    <?= ($transaksi->status == 'diproses')
                        ? 'selected'
                        : ''; ?>>
                    Diproses
                </option>

                <option
                    value="selesai"
                    <?= ($transaksi->status == 'selesai')
                        ? 'selected'
                        : ''; ?>>
                    Selesai
                </option>

                <option
                    value="dibatalkan"
                    <?= ($transaksi->status == 'dibatalkan')
                        ? 'selected'
                        : ''; ?>>
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
                Update Transaksi
            </button>

        </div>


    </form>

</div>