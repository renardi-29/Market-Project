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

    public function get_penjual()
    {
        return $this->db
            ->where('role', 'penjual')
            ->order_by('nama', 'ASC')
            ->get('users')
            ->result();
    }

    public function insert($data)
    {
        return $this->db
            ->insert('produk', $data);
    }
}
