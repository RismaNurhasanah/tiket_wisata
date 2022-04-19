<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use CodeItNow\BarcodeBundle\Utils\QrCode;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Home_model');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('index');
        $this->load->view('layout/footer');
    }

    public function wisata()
    {
        $wisata = $this->Home_model->getWisata()->result_array();

        $data= [
            'wisata' => $wisata
        ];

        $this->load->view('layout/header');
        $this->load->view('wisata', $data);
        $this->load->view('layout/footer');
    }

    public function save_transaksi()
    {
       $namalengkap =  $this->input->post('nama_lengkap');
       $noktp       =  $this->input->post('no_ktp');
       $nohp        =  $this->input->post('no_hp');
       $tanggal     =  $this->input->post('tanggal_kunjungan');
       $dewasa      =  $this->input->post('pengunjung_dewasa');
       $anak        =  $this->input->post('pengunjung_anak');
       $wisata      =  $this->input->post('wisataid');
       $now         = date("Y-m-d H:i:s");
       $qrcode      = $this->generate();

       $data = [
           'nama_lengkap'       => $namalengkap,
           'no_identitas'       => $noktp,
           'no_hp'              => $nohp,
           'tempat_wisata'      => $wisata,
           'tanggal_kunjungan'  => $tanggal,
           'dewasa'             => $dewasa,
           'anak'               => $anak,
           'qrcode'             => $qrcode,
           'created_date'       => $now
       ];
       
       $id = $this->Home_model->AddTransaksi($data);
       redirect('Home/print_data/'.$id);
    }

    public function print_data($id)
    {
        $wisata = $this->Home_model->getTransaksi($id)->result_array()[0];
        $data = [
            'detailpesan' => $wisata
        ];

        $this->load->view('printdata',$data);
    }

    public function generate()
    {
        $data  = (rand(1000000,1000000000));
        
        $this->load->library('ciqrcode');
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$data.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $data; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        
        return $image_name;
    }
}