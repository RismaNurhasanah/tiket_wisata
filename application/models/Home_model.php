<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Home_model extends CI_Model {

    public function getWisata()
    {
       return $this->db->get('wisata');
    }

    public function AddTransaksi($data)
    {
        $total = $this->db->insert('transaksi', $data);
        $total = $this->db->insert_id();
        return $total;
    }

    public function getTransaksi($id)
    {
        $this->db->join('wisata','wisata.wisata_id = transaksi.tempat_wisata');
        return  $this->db->get_where('transaksi', array('pk_transaksi_id' => $id));
        
    }
}