<div class="page-header">
    <div class="page-header-info">
        <h1>Tambah Produk</h1>

        <p>
            Tambahkan produk baru ke Market Project.
        </p>
    </div>
</div>

<div class="form-container">

    <?= validation_errors('<div class="alert-error">', '</div>'); ?>

    <form action="<?= site_url('produk/simpan'); ?>" method="post">

        <div class="form-group">
            <label for="user_id">
                Penjual
            </label>

            <select name="user_id" id="user_id" required>
                <option value="">
                    -- Pilih Penjual --
                </option>

                <?php if (!empty($penjual)): ?>

                    <?php foreach ($penjual as $item): ?>
                        <option
                            value="<?= $item->id; ?>"
                            <?= set_select('user_id', $item->id); ?>>
                            <?= html_escape($item->nama); ?>
                        </option>

                    <?php endforeach; ?>

                <?php endif; ?>

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
                value="<?= set_value('nama_produk'); ?>"
                placeholder="Contoh: Kipas Angin"
                required>
        </div>


        <div class="form-group">
            <label for="deskripsi">
                Deskripsi
            </label>

            <textarea
                name="deskripsi"
                id="deskripsi"
                rows="4"
                placeholder="Deskripsi produk..."><?= set_value('deskripsi'); ?></textarea>
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
                    value="<?= set_value('harga'); ?>"
                    min="0"
                    placeholder="120000"
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
                    value="<?= set_value('stok'); ?>"
                    min="0"
                    placeholder="10"
                    required>
            </div>

        </div>


        <div class="form-actions">

            <a
                href="<?= site_url('produk'); ?>"
                class="btn-secondary">
                Batal
            </a>

            <button
                type="submit"
                class="btn-primary">
                Simpan Produk
            </button>

        </div>

    </form>

</div>