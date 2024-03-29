<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT, GET, POST");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $params = array('server_key' => 'Mid-server-hR-clgDGpAg1Zk2yQ5vemVYn', 'production' => true);
        $this->load->library('form_validation');
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('welcome/siswa');
        }

    }

    public function index()
    {
        $this->load->model('m_siswa');
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->m_siswa->tampil_data()->result_array();

        $this->load->view('siswa/index',$data);
    }

    

    

    public function pembayaran()
    {
        $this->load->model('m_siswa');

        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->m_siswa->tampil_data()->result_array();
        $this->load->model('M_spp');

        $this->load->model('m_transaksi');
        $data['transaksi'] = $this->m_transaksi->tampil_data()->result_array();
        $data['spp'] = $this->M_spp->tampil_data()->result_array();
        $this->load->view('siswa/pembayaran', $data);
    }


    public function bayar()
    {
        $this->load->model('m_spp');
        $this->load->model('m_siswa');
        $this->load->model('m_transaksi');
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $data['spp'] = $this->m_spp->sppWhere(['id' => $this->uri->segment(4)])->result_array();
        $data['nama'] = $this->m_siswa->siswaWhere(['id' => $this->uri->segment(3)])->result_array();
        $data['transaksi'] =  $this->m_transaksi->transaksiWhere(['id' => $this->uri->segment(3)]);

        $this->load->view('siswa/bayar',$data);       
    }

    public function bayar_detail()
    {

        $this->load->model('m_transaksi');
        $this->load->model('m_spp'); 
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();  
        $data['transaksi'] = $this->m_transaksi->transaksiWhere(['id_siswa' => $this->uri->segment(3)])->result_array();

        $this->load->view('siswa/bayar_detail',$data);
    }



    //midtrans
    public function token()
    {
       $nama = $this->input->post('nama');
       $jumlah = $this->input->post('jumlah');
       $bulan = $this->input->post('bulan');


        // Required
       $transaction_details = array(
        'order_id' => rand(),
          'gross_amount' => $jumlah,// no decimal allowed for creditcard
      );

        // Optional
       $item1_details = array(
        'id' => 'a1',
        'price' => $jumlah,
        'quantity' => 1,
        'name' => "pembayaran spp ".$nama." Bulan ".$bulan
    );

        // Optional
       $item_details = array ($item1_details);

        // Optional
        // $billing_address = array(
        //     'first_name'    => "Andri",
        //     'last_name'     => "Litani",
        //     'address'       => "Mangga 20",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16602",
        //     'phone'         => "081122334455",
        //     'country_code'  => 'IDN'
        // );

        // // Optional
        // $shipping_address = array(
        //     'first_name'    => "Obet",
        //     'last_name'     => "Supriadi",
        //     'address'       => "Manggis 90",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16601",
        //     'phone'         => "08113366345",
        //     'country_code'  => 'IDN'
        // );

        // Optional
       $customer_details = array(
        'first_name'    => $nama
    );

        // Data yang akan dikirim untuk request redirect_url.
       $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

       $time = time();
       $custom_expiry = array(
        'start_time' => date("Y-m-d H:i:s O",$time),
        'unit' => 'day', 
        'duration'  => 7
    );

       $transaction_data = array(
        'transaction_details'=> $transaction_details,
        'item_details'       => $item_details,
        'customer_details'   => $customer_details,
        'credit_card'        => $credit_card,
        'expiry'             => $custom_expiry
    );

       error_log(json_encode($transaction_data));
       $snapToken = $this->midtrans->getSnapToken($transaction_data);
       error_log($snapToken);
       echo $snapToken;
   }

   public function finish()
   {
    $result = json_decode($this->input->post('result_data'), TRUE);
    $jumlah = $this->input->post('jumlah');
        // $id = $this->input->post('id');
        // $bulan = $this->input->post('bulan1');
        // echo 'RESULT <br><pre>';
        // var_dump($result,$_POST);
        // echo '</pre>' ;
        // print_r($_POST);


    $data = [
        'id_siswa' => $_POST['id_siswa'],
        'bulan' => $_POST['bulan1'],
        'id_spp' => $_POST['id_spp'],
        'order_id' => $result['order_id'],
        'gross_amount' => $result['gross_amount'],
        'payment_type' => $result['payment_type'],
        'transaction_time' => $result['transaction_time'],
        'bank' => $result['va_numbers'][0]["bank"],
        'va_number' => $result['va_numbers'][0]["va_number"],
        'pdf_url' => $result['pdf_url'],
        'status_code' => $result['status_code']
    ];
    
    $simpan = $this->db->insert('transaksi', $data);
    
    if($simpan){
        $this->session->set_flashdata('success', 'Berhasil!');
        redirect(base_url('siswa/pembayaran'));
    }else{
        $this->session->set_flashdata('gagal', 'Gagal!');
        redirect(base_url('siswa/pembayaran'));
    }
}
}
