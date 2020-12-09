<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('welcome/admin');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('admin/index');
    }

    // Management Siswa

    public function data_siswa()
    {
        $this->load->model('m_siswa');

        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_siswa->tampil_data()->result();
        $this->load->view('admin/data_siswa', $data);
    }

    public function detail_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $detail = $this->m_siswa->detail_siswa($id);
        $data['detail'] = $detail;
        $this->load->view('admin/detail_siswa', $data);
    }

    public function update_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $data['user'] = $this->m_siswa->update_siswa($where, 'siswa')->result();
        $this->load->view('admin/update_siswa', $data);
    }

    public function user_edit()
    {
        $this->load->model('m_siswa');

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $gambar = $_FILES['image']['name'];

        $data = array(
            'nama' => $nama,
            'email' => $email,
        );

        $config['allowed_types'] = 'jpg|png|gif|jfif';
        $config['max_size'] = '4096';
        $config['upload_path'] = './assets/profile_picture';

        $this->load->library('upload', $config);
        //berhasil
        if ($this->upload->do_upload('image')) {
            $gambarLama = $data['user']['image'];
            if ($gambarLama != 'default.jpg') {
                unlink(FCPATH . '/assets/profile_picture/' . $gambarLama);
            }
            $gambarBaru = $this->upload->data('file_name');
            $this->db->set('image', $gambarBaru);
        } else {
            echo $this->upload->display_errors();
        }

        $where = array(
            'id' => $id,
        );

        $this->m_siswa->update_data($where, $data, 'siswa');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_siswa');
    }

    public function delete_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $this->m_siswa->delete_siswa($where, 'siswa');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_siswa');
    }

        public function pembayaran_siswa()
    {
        $this->load->model('m_siswa');

        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_siswa->tampil_data()->result();
        $this->load->view('admin/pembayaran_siswa', $data);
    }

    // manajemen guru

    public function data_guru()
    {
        $this->load->model('m_guru');
        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_guru->tampil_data()->result();
        $this->load->view('admin/data_guru', $data);
    }

    public function detail_guru($nip)
    {
        $this->load->model('m_guru');
        $where = array('nip' => $nip);
        $detail = $this->m_guru->detail_guru($nip);
        $data['detail'] = $detail;
        $this->load->view('admin/detail_guru', $data);
    }

    public function update_guru($nip)
    {
        $this->load->model('m_guru');
        $where = array('nip' => $nip);
        $data['user'] = $this->m_guru->update_guru($where, 'guru')->result();
        $this->load->view('admin/update_guru', $data);
    }

    public function guru_edit()
    {
        $this->load->model('m_guru');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        $data = array(
            'nip' => $nip,
            'nama_guru' => $nama,
            'email' => $email,

        );

        $where = array(
            'nip' => $nip,
        );

        $this->m_guru->update_data($where, $data, 'guru');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_guru');
    }

    public function delete_guru($nip)
    {
        $this->load->model('m_guru');
        $where = array('nip' => $nip);
        $this->m_guru->delete_guru($where, 'guru');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_guru');
    }

    public function add_guru()
    {
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom NIP.',
            'min_length' => 'NIP terlalu pendek.',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[guru.email]', [
            'is_unique' => 'Email ini telah digunakan!',
            'required' => 'Harap isi kolom email.',
            'valid_email' => 'Masukan email yang valid.',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom nAMA.',
            'min_length' => 'Nama terlalu pendek.',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Harap isi kolom Password.',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('guru/registration');
        } else {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nama_guru' => htmlspecialchars($this->input->post('nama', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('guru', $data);

            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('admin/data_guru'));
        }
    }
}
