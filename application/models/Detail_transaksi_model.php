<?php

class Detail_transaksi_model extends CI_Model
{
    public function get_all()
    {
        return $this->db
            ->select('
                detail_transaksi.*,
                produk.nama_produk,
                transaksi.id AS nomor_transaksi
            ')
            ->from('detail_transaksi')
            ->join(
                'produk',
                'produk.id = detail_transaksi.produk_id'
            )
            ->join(
                'transaksi',
                'transaksi.id = detail_transaksi.transaksi_id'
            )
            ->order_by('detail_transaksi.id', 'DESC')
            ->get()
            ->result();
    }


    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('detail_transaksi')
            ->row();
    }


    public function get_transaksi()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get('transaksi')
            ->result();
    }


    public function get_produk()
    {
        return $this->db
            ->order_by('nama_produk', 'ASC')
            ->get('produk')
            ->result();
    }


    public function insert($data)
    {
        $this->db->trans_start();

        $this->db->insert('detail_transaksi', $data);

        $this->update_total_transaksi($data['transaksi_id']);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function update($id, $data)
    {
        $detail_lama = $this->get_by_id($id);

        if (!$detail_lama) {
            return false;
        }

        $this->db->trans_start();

        $this->db
            ->where('id', $id)
            ->update('detail_transaksi', $data);

        // Update total transaksi lama
        $this->update_total_transaksi(
            $detail_lama->transaksi_id
        );

        // Jika transaksi berubah, update juga transaksi baru
        if ($detail_lama->transaksi_id != $data['transaksi_id']) {
            $this->update_total_transaksi(
                $data['transaksi_id']
            );
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    public function delete($id)
    {
        $detail = $this->get_by_id($id);

        if (!$detail) {
            return false;
        }

        $this->db->trans_start();

        $this->db
            ->where('id', $id)
            ->delete('detail_transaksi');

        // Hitung ulang total transaksi
        $this->update_total_transaksi(
            $detail->transaksi_id
        );

        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    private function update_total_transaksi($transaksi_id)
    {
        $result = $this->db
            ->select_sum('subtotal')
            ->where('transaksi_id', $transaksi_id)
            ->get('detail_transaksi')
            ->row();

        $total = ($result && isset($result->subtotal)) ? $result->subtotal : 0;

        $this->db
            ->where('id', $transaksi_id)
            ->update('transaksi', [
                'total' => $total
            ]);
    }
}
