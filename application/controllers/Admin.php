<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
    }

    public function index()
    {
        $this->load->view('admin/index');
    }

    public function login()
    {    

        $this->form_validation->set_rules('username', 'username','required', [
			'required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('username', 'password','required', [
			'required' => 'Password wajib diisi!']);
		
        if ($this->form_validation->run()== FALSE){			
            redirect('/');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $cek 	= $this->Admin_model->cek_login($user, $pass);

            $hasil 	= $cek->result();

            if($cek->num_rows() > 0){
                foreach ($cek->result() as $ck) {

                    $sess_data['login_id'] = $ck->pk_login_id;
                    $sess_data['username'] = $ck->username;

                    $this->session->set_userdata($sess_data);
                    
                }
                
                redirect('Admin/dashboard');
               
            }else{
                    $this->session->sess_destroy();
                    $this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Username atau Password Salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
                    redirect('Admin');
            }
        }
       
    }

    function dashboard()
    {
        if(!isset($this->session->userdata['username'])) {
			redirect('Admin');
		}

        $this->load->view('layout/header');
        $this->load->view('admin/dashboard');
        $this->load->view('layout/footer');
    }

    function transaksi()
    {
        if(!isset($this->session->userdata['username'])) {
			redirect('Admin');
		}

        $wisata = $this->Admin_model->getTransaksi()->result_array();
        $data = [
            'transaksi' => $wisata
        ];

        $this->load->view('layout/header');
        $this->load->view('admin/transaksi', $data);
        $this->load->view('layout/footer');

    }

    function logout()
    {
		$this->session->sess_destroy();
		redirect('Admin');
    }


    function ubah_status($id)
    {
        if(!isset($this->session->userdata['username'])) {
			redirect('Admin');
		}

        $getTransaksi = $this->db->get_where('transaksi', array('pk_transaksi_id' => $id))->result_array()[0];
        $getStatus = $getTransaksi['status'];

        if($getStatus == 'Y'){
            $update = "N";
        }else{
            $update = "Y";
        }

        $data = [
            'status' => $update
        ];

        $where = [
            'pk_transaksi_id' => $id
        ];

        $this->db->update('transaksi', $data, $where);

		redirect('Admin/transaksi');
    }

    function hapus($id)
    {
        $where = [
            'pk_transaksi_id' => $id
        ];
        $this->db->delete('transaksi', $where);
		redirect('Admin/transaksi');

    }
}
