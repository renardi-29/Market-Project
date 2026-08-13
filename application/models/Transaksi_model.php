<?php

class Transaksi_model extends CI_Model
{
    public function get_all()
    {
        return $this->db
            ->select('
                transaksi.*,
                users.nama AS nama_pembeli
            ')
            ->from('transaksi')
            ->join('users', 'users.id = transaksi.user_id')
            ->order_by('transaksi.id', 'DESC')
            ->get()
            ->result();
    }


    public function get_by_id($id)
    {
        return $this->db
            ->select('
                transaksi.*,
                users.nama AS nama_pembeli
            ')
            ->from('transaksi')
            ->join('users', 'users.id = transaksi.user_id')
            ->where('transaksi.id', $id)
            ->get()
            ->row();
    }


    public function get_detail($transaksi_id)
    {
        return $this->db
            ->select('
                detail_transaksi.*,
                produk.nama_produk
            ')
            ->from('detail_transaksi')
            ->join(
                'produk',
                'produk.id = detail_transaksi.produk_id'
            )
            ->where('detail_transaksi.transaksi_id', $transaksi_id)
            ->get()
            ->row();
    }


    public function get_pembeli()
    {
        return $this->db
            ->where('role', 'pembeli')
            ->order_by('nama', 'ASC')
            ->get('users')
            ->result();
    }


    public function get_produk()
    {
        return $this->db
            ->order_by('nama_produk', 'ASC')
            ->get('produk')
            ->result();
    }


    public function insert($transaksi, $detail)
    {
        $this->db->trans_start();

        // Ambil produk
        $produk = $this->db
            ->where('id', $detail['produk_id'])
            ->get('produk')
            ->row();

        if (!$produk) {
            $this->db->trans_rollback();
            return false;
        }

        // Cek stok
        if ($produk->stok < $detail['jumlah']) {
            $this->db->trans_rollback();
            return false;
        }

        // Simpan transaksi
        $this->db->insert('transaksi', $transaksi);

        $transaksi_id = $this->db->insert_id();

        // Hubungkan detail dengan transaksi
        $detail['transaksi_id'] = $transaksi_id;

        $this->db->insert(
            'detail_transaksi',
            $detail
        );

        // Kurangi stok
        $this->db
            ->where('id', $detail['produk_id'])
            ->set(
                'stok',
                'stok - ' . (int) $detail['jumlah'],
                false
            )
            ->update('produk');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function update($id, $transaksi, $detail)
    {
        $this->db->trans_start();

        // Ambil detail transaksi lama
        $detail_lama = $this->db
            ->where('transaksi_id', $id)
            ->get('detail_transaksi')
            ->row();

        if (!$detail_lama) {
            $this->db->trans_rollback();
            return false;
        }

        // Kembalikan stok produk lama
        $this->db
            ->where('id', $detail_lama->produk_id)
            ->set(
                'stok',
                'stok + ' . (int) $detail_lama->jumlah,
                false
            )
            ->update('produk');

        // Cek produk baru
        $produk = $this->db
            ->where('id', $detail['produk_id'])
            ->get('produk')
            ->row();

        if (!$produk) {
            $this->db->trans_rollback();
            return false;
        }

        // Cek apakah stok mencukupi
        if ($produk->stok < $detail['jumlah']) {
            $this->db->trans_rollback();
            return false;
        }

        // Update transaksi
        $this->db
            ->where('id', $id)
            ->update('transaksi', $transaksi);

        // Update detail transaksi
        $this->db
            ->where('transaksi_id', $id)
            ->update('detail_transaksi', $detail);

        // Kurangi stok produk baru
        $this->db
            ->where('id', $detail['produk_id'])
            ->set(
                'stok',
                'stok - ' . (int) $detail['jumlah'],
                false
            )
            ->update('produk');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function delete($id)
    {
        $this->db->trans_start();

        // Ambil detail transaksi
        $detail = $this->db
            ->where('transaksi_id', $id)
            ->get('detail_transaksi')
            ->row();

        if ($detail) {

            // Kembalikan stok
            $this->db
                ->where('id', $detail->produk_id)
                ->set(
                    'stok',
                    'stok + ' . (int) $detail->jumlah,
                    false
                )
                ->update('produk');

            // Hapus detail transaksi
            $this->db
                ->where('transaksi_id', $id)
                ->delete('detail_transaksi');
        }

        // Hapus transaksi
        $this->db
            ->where('id', $id)
            ->delete('transaksi');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }
}
