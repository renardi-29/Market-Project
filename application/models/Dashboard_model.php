<?php

class Dashboard_model extends CI_Model
{
    public function total_produk()
    {
        return $this->db
            ->count_all('produk');
    }


    public function total_transaksi()
    {
        return $this->db
            ->count_all('transaksi');
    }


    public function total_penjual()
    {
        return $this->db
            ->where('role', 'penjual')
            ->count_all_results('users');
    }


    public function total_pembeli()
    {
        return $this->db
            ->where('role', 'pembeli')
            ->count_all_results('users');
    }
}
