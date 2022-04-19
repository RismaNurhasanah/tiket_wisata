<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function cek_login($user, $pass)
    {
		$this->db->where('username', $user);
        $this->db->where('password', $pass);
        $query = $this->db->get('login');
        return $query;
    }

    function getTransaksi()
    {
        $this->db->join('wisata','wisata.wisata_id = transaksi.tempat_wisata');
        return  $this->db->get('transaksi');
    }

}