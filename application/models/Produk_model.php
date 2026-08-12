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

    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('produk')
            ->row();
    }

    public function insert($data)
    {
        return $this->db
            ->insert('produk', $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('produk', $data);
    }
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('produk');
    }
}
