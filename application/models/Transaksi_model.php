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

        $this->db->insert('transaksi', $transaksi);

        $transaksi_id = $this->db->insert_id();

        $detail['transaksi_id'] = $transaksi_id;

        $this->db->insert('detail_transaksi', $detail);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function update($id, $transaksi, $detail)
    {
        $this->db->trans_start();

        $this->db
            ->where('id', $id)
            ->update('transaksi', $transaksi);

        $this->db
            ->where('transaksi_id', $id)
            ->update('detail_transaksi', $detail);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function delete($id)
    {
        $this->db->trans_start();

        $this->db
            ->where('transaksi_id', $id)
            ->delete('detail_transaksi');

        $this->db
            ->where('id', $id)
            ->delete('transaksi');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }
}
