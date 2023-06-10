<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class Departemen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "2"){
            redirect("welcome/");
        }
        $this->load->helper('file');
        $this->load->model('M_Akun');
        $this->load->model('M_Surat');
        $this->load->model('M_Note');
        $this->load->model('M_Log');
    }

    public function index(){
        redirect(base_url('departemen/daftar_total'));
    }

    public function header(){
        $head['username'] = $this->session->userdata('username');
        $head['role'] = $this->session->userdata('role');
        $head['nama'] = $this->session->userdata('nama');
        $this->load->view('layout/header', $head);
    }

    public function log()
    {
        $id = $this->id;
        $log_dep = $this->M_Log->get_log(array("id_surat"=>$id, "user"=>0))->result();
        $log_kadep = $this->M_Log->get_log(array("id_surat"=>$id, "user"=>1))->result();
        $log_ver = $this->M_Log->get_log(array("id_surat"=>$id, "user"=>2))->result();
        $log_sup = $this->M_Log->get_log_c(["id_surat"=>$id, "user"=>3], 4)->result();
        $log_man = $this->M_Log->get_log(array("id_surat"=>$id, "user"=>5))->result();
        $log_wad = $this->M_Log->get_log_c(["id_surat"=>$id, "user"=>6], 7)->result();
        $log_dekan = $this->M_Log->get_log(array("id_surat"=>$id, "user"=>8))->result();
        $log_finish = $this->M_Log->get_log(array("id_surat"=>$id, "next_user"=>9))->result();
        $sent = ["tb_surat.id"=>$id];
        $log['surat'] = $this->M_Surat->get_where_surat($sent)->row();
        $log['log_finish'] = $log_finish;
        $log['log_departemen'] = $log_dep;
        $log['log_kadep'] = $log_kadep;
        $log['log_verifikator'] = $log_ver;
        $log['log_supervisor'] = $log_sup;
        $log['log_manager'] = $log_man;
        $log['log_wadek'] = $log_wad;
        $log['log_dekan'] = $log_dekan;
        $this->load->view('progress_bar', $log);
    }

    public function catatan()
    {
        $id = $this->id;
        $dep = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>0))->row();
        if (!empty($dep)){
            $data['dep']=$dep;
        };
        $kadep = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>1))->result();
        if (!empty($kadep)){
            $data['kadep']=$kadep;
        };
        $verifikator = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>2))->result();
        if (!empty($verifikator)){
            $data['verifikator']=$verifikator;
        };
        $supervisor = $this->M_Note->get_where_note_c(['id_surat'=>"$id", 'role'=>3], 4)->result();
        if (!empty($supervisor)){
            $data['supervisor']=$supervisor;
        };
        $manager = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>5))->result();
        if (!empty($manager)){
           $data['manager']=$manager;
        };
        $wadek = $this->M_Note->get_where_note_c(['id_surat'=>"$id", 'role'=>6], 7)->result();
        if (!empty($wadek)){
            $data['wadek']=$wadek;
        };
        $dekan = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>8))->result();
        if (!empty($dekan)){
            $data['dekan']=$dekan;
        };
    }

    public function daftar_total()
    {
        $dep = ["tb_surat.departemen"=>$this->session->userdata('id'), 
                "tb_surat.id_operator"=>$this->session->userdata('operator'),];
        $data['view'] = $this->M_Surat->get_surat($dep)->result();
        // print_r ($dep);
        $this->header();
        $this->load->view('departemen/daftar_surat', $data);
        $this->load->view('layout/footer');
    }

    public function daftar_draft()
    {
        $dep = ["tb_surat.departemen"=>$this->session->userdata('id'), 
                "tb_surat.status"=>"draft",
                "tb_surat.id_operator"=>$this->session->userdata('operator'),];
        $data['view'] = $this->M_Surat->get_surat($dep)->result();
        // print_r ($dep);
        $this->header();
        $this->load->view('departemen/daftar_surat', $data);
        $this->load->view('layout/footer');
    }

    public function daftar_approve()
    {
        $dep = ["tb_surat.departemen"=>$this->session->userdata('id'), 
                "tb_surat.status"=>"7",
                "tb_surat.id_operator"=>$this->session->userdata('operator'),];
        $data['view'] = $this->M_Surat->get_surat($dep)->result();
        // print_r ($dep);
        $this->header();
        $this->load->view('departemen/daftar_surat', $data);
        $this->load->view('layout/footer');
    }

    public function pengajuan_surat() 
    {
        $this->header();
        $this->load->view('departemen/pengajuan_surat');
        $this->load->view('layout/footer');
    }

    public function insert_pengajuan()
    {
        $departemen = $this->session->userdata('id');
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $catatan = $this->input->post('catatan');
        $status = $this->input->post('status');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));

        $data = [
            'judul'=>"$judul",
            'to'=>"$to",
            'from'=>"$from",
            'body'=>"$isi",
            'tgl'=>$tgl,
            'id_operator'=>$this->session->userdata('operator'),
            'departemen'=>$departemen,
            'status'=>"$status",
        ];
        $id = $this->M_Surat->insert_pengajuan($data);
        $cond = ['id'=>$id];

        $data_catatan = [
            'role'=>"0",
            'id_surat'=>"$id",
            'catatan'=>"$catatan",
            'tgl'=>$tgl,
        ];
        $this->M_Note->insert_note($data_catatan);

        $file = $_FILES['file'];
        if(empty($file['name'])){}
            else{
            $config['upload_path'] = './assets/lampiran';
            $config['encrypt_name'] = TRUE;
            $config['allowed_types'] = '*';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Upload Gagal"; die();
            } else {
                $file=$this->upload->data('file_name');
            }
            $datafile = [
            "lamp"=>$file,];
            // $this->M_Pengaduan->update_pengaduan($datafile,$id);
            $this->M_Surat->update_pengajuan($datafile, $cond);
        }

        if($status!="draft"){
            $log = [
                "id_surat"=>$id,
                "user"=>0,
                "round"=>0,
                "next_user"=>1,
                "status"=>1,
                "tgl"=>"$tgl"
            ];
            $log_cek = [
                "id_surat"=>$id,
                "user"=>0,
                "round"=>0,
                "next_user"=>1,
                "status"=>1,
                "round"=>0,
            ];
            $this->M_Log->log($log, $log_cek);
        }
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Pengajuan berhasil ditambahkan, silahkan pilih "detail" untuk melihat progres</div></div>');
        redirect(base_url("departemen/daftar_total"));

    }

    public function edit_surat(){
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url('departemen/daftar_total'));
        };
        $sent = ["tb_surat.id"=>$id];
        $cond_cat = ["tb_notes.id_surat"=>$id, "tb_notes.role"=>0];
        $id_sk = ["id_sk"=>$id];
        $data['surat'] = $this->M_Surat->get_where_surat($sent)->row();
        $data['cat'] = $this->M_Note->get_where_note($cond_cat)->row();
        $dep = ["tb_surat.departemen"=>$this->session->userdata('id')];
        $this->id = "$id";
        $this->header();
        $this->log();
        $this->load->view('departemen/edit', $data);
        $this->load->view('layout/footer');
    }

    public function update_pengajuan()
    {
        $id = $this->input->post('id');
        $departemen = $this->session->userdata('id');
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $catatan = $this->input->post('catatan');
        $status = $this->input->post('status');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));

        $data = [
            'judul'=>"$judul",
            'to'=>"$to",
            'from'=>"$from",
            'body'=>"$isi",
            // 'tgl'=>$tgl,
            'id_operator'=>$this->session->userdata('operator'),
            'departemen'=>$departemen,
            'status'=>"$status",
        ];
        $cond = ['id'=>$id];
        $this->M_Surat->update_pengajuan($data, $cond);

        $cond_cat = [
            'id_surat'=>$id,
            'role'=>0,
        ];
        $data_catatan = [
            'role'=>"0",
            'id_surat'=>"$id",
            'catatan'=>"$catatan",
            // 'tgl'=>$tgl,
        ];
        $this->M_Note->update_note($data_catatan, $cond_cat);

        $file = $_FILES['file'];
        if(empty($file['name'])){}
            else{
            $config['upload_path'] = './assets/lampiran';
            $config['encrypt_name'] = TRUE;
            $config['allowed_types'] = '*';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Upload Gagal"; die();
            } else {
                $file=$this->upload->data('file_name');
            }
            $datafile = [
            "lamp"=>$file,];
            // $this->M_Pengaduan->update_pengaduan($datafile,$id);
            $this->M_Surat->update_pengajuan($datafile, $cond);
        }

        if($status!="draft"){
            $log = [
                "id_surat"=>$id,
                "user"=>0,
                "round"=>0,
                "next_user"=>1,
                "status"=>1,
                "tgl"=>"$tgl"
            ];
            $log_cek = [
                "id_surat"=>$id,
                "user"=>0,
                "round"=>0,
                "next_user"=>1,
                "status"=>1,
                "round"=>0,
            ];
            $this->M_Log->log($log, $log_cek);
        }
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Pengajuan berhasil ditambahkan, silahkan pilih "detail" untuk melihat progres</div></div>');
        redirect(base_url("departemen/daftar_total"));

    }

    public function ajukan(){
        $id = $this->input->post('id');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));
        $data = [
            'tgl'=>$tgl,
            'status'=>0,
        ];
        $cond = ['id'=>$id];
        $log = [
            "id_surat"=>$id,
            "user"=>0,
            "round"=>0,
            "next_user"=>1,
            "status"=>1,
            "tgl"=>"$tgl"
        ];
        $log_cek = [
            "id_surat"=>$id,
            "user"=>0,
            "round"=>0,
            "next_user"=>1,
            "status"=>1,
            "round"=>0,
        ];
        $this->M_Log->log($log, $log_cek);
        $this->M_Surat->update_pengajuan($data, $cond);

        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Draft berhasil diajukan</div></div>');
        redirect(base_url('departemen/daftar_total'));
    }

    public function delete_pengajuan(){
        $id = $this->input->post('id');
        $this->M_Surat->del_surat(array("id"=>$id));
        $this->M_Log->del_log(array("id_surat"=>$id));
        $this->M_Note->del_note(array("id_surat"=>$id));
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Pengajuan berhasil dihapus</div></div>');
        redirect(base_url('departemen/daftar_total'));
    }
}