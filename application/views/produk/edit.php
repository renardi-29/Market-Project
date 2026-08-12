<?php

/** @var object $produk */
/** @var array $penjual */
?>
<div class="page-header">

    <div class="page-header-info">
        <h1>Edit Produk</h1>

        <p>
            Perbarui informasi produk di Market Project.
        </p>
    </div>

</div>


<div class="form-container">

    <form action="<?= site_url('produk/update/' . $produk->id); ?>" method="post">

        <div class="form-group">

            <label for="user_id">
                Penjual
            </label>

            <select name="user_id" id="user_id" required>

                <option value="">
                    -- Pilih Penjual --
                </option>

                <?php foreach ($penjual as $item): ?>

                    <option
                        value="<?= $item->id; ?>"
                        <?= ($produk->user_id == $item->id) ? 'selected' : ''; ?>>
                        <?= html_escape($item->nama); ?>
                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label for="nama_produk">
                Nama Produk
            </label>

            <input
                type="text"
                name="nama_produk"
                id="nama_produk"
                value="<?= html_escape($produk->nama_produk); ?>"
                required>

        </div>


        <div class="form-group">

            <label for="deskripsi">
                Deskripsi
            </label>

            <textarea
                name="deskripsi"
                id="deskripsi"
                rows="5"><?= html_escape($produk->deskripsi); ?></textarea>

        </div>


        <div class="form-row">

            <div class="form-group">

                <label for="harga">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    id="harga"
                    value="<?= $produk->harga; ?>"
                    min="0"
                    required>

            </div>


            <div class="form-group">

                <label for="stok">
                    Stok
                </label>

                <input
                    type="number"
                    name="stok"
                    id="stok"
                    value="<?= $produk->stok; ?>"
                    min="0"
                    required>

            </div>

        </div>


        <div class="form-actions">

            <a
                href="<?= site_url('produk'); ?>"
                class="btn-cancel">
                Batal
            </a>

            <button
                type="submit"
                class="btn-primary">
                Update Produk
            </button>

        </div>

    </form>

</div>