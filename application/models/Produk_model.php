<?php

class Produk_model extends CI_Model
{
    public function get_all()
    {
        return $this->db
            ->select('produk.*, users.nama AS nama_penjual')
            ->from('produk')
            ->join('users', 'users.id = produk.user_id')
            ->order_by('produk.id', 'DESC')
            ->get()
            ->result();
    }
}
