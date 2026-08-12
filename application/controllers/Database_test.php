<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database_test extends CI_Controller
{
    public function index()
    {
        $query = $this->db->query("SELECT DATABASE() AS nama_database");

        $result = $query->row();

        echo "Database berhasil terhubung!<br>";
        echo "Database: " . $result->nama_database;
    }
}
