<?php

class Blog extends CI_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->library('session');

    }
    public function index ($offset = 0)
    {
        $this->load->library('pagination');
        $config['base_url']     = site_url('blog/index');
        $config['total_rows']   = $this->Blog_model->getTotalArtikel();
        $config['per_page']     = 3;
        $this->pagination->initialize($config);
        // $data["blogs"] = [
        // ["judul" => "Artikel Pertama",
        // "konten" => "Ini adalah contoh konten artikel pertama, ya!"
        // ],
        // ["judul" => "Artikel Kedua",
        // "konten" => "Ini adalah contoh konten artikel kedua, ya!"
        // ],
        // ["judul" => "Artikel Ketiga",
        // "konten" => "Ini adalah contoh konten artikel ketiga, ya!"
        // ]
        // ];
        $query = $this->Blog_model->getArtikel($config['per_page'], $offset);
        $data["blogs"] = $query->result_array();

        $this->load->view('blog', $data);
    }

    public function detail ($url)
    {
        $query = $this->Blog_model->getSingleArtikel('url',$url);
        $data["blog"] = $query->row_array();

        $this->load->view('detail', $data);
    }

    public function add ()
    {   
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required|alpha_dash');

        if ($this->form_validation->run() === TRUE) {
            $data['judul'] = $this->input->post('judul');
            $data['konten'] = $this->input->post('konten');
            $data['url'] = $this->input->post('url');
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $data['gambar'] = $this->upload->data('file_name');
            }

            $id = $this->Blog_model->insertArtikel($data);

            if ($id){
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan</div>');
                redirect('/');
            } else 
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Data gagal disimpan</div>');
                redirect('/');
        }
        // $this->db->insert('blog', $data);
        $this->load->view('form_add');
    }

    public function edit ($id) 
    {
        $query = $this->Blog_model->getSingleArtikel('id',$id);
        $data['blog'] = $query->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required|alpha_dash');

        if ($this->form_validation->run() === TRUE) {
            $post['judul'] = $this->input->post('judul');
            $post['konten'] = $this->input->post('konten');
            $post['url'] = $this->input->post('url');

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');

            if (!empty($this->upload->data('file_name')))
            {
                $post['gambar'] = $this->upload->data('file_name');
            }

            $id = $this->Blog_model->updateArtikel($id, $post);
            if ($id) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan</div>');
                redirect('/');
            } else 
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data gagal disimpan</div>');
                redirect('/');      
        }

        $this->load->view('form_edit', $data);
    }

    public function delete ($id)
    {
        $result = $this->Blog_model->deleteArtikel($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus</div>');
            redirect('/');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data gagal dihapus</div>');
            redirect('/');
        }
    }

    public function login ()
    {
        if ($this->input->post()) { 
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($username == 'admin' && $password == 'admin') {
                $_SESSION['username'] = 'admin';
                redirect('/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Username atau Password Salah!</div>');
                redirect('blog/login');
            }
    }
        $this->load->view('form_login');
    }

    public function logout ()
    {

        $this->session->sess_destroy();
        redirect('/');

    }

}