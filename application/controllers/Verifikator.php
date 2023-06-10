<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class Verifikator extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "4"){
            redirect("welcome/");
        }
        $this->load->helper('file');
        $this->load->model('M_Akun');
        $this->load->model('M_Surat');
        $this->load->model('M_Note');
        $this->load->model('M_Log');
    }

    public function index(){
        redirect(base_url('verifikator/daftar_total'));
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

    public function daftar_total()
    {
        $data['view'] = $this->M_Surat->get_all_surat()->result();
        // print_r ($dep);
        $this->header();
        $this->load->view('verifikator/daftar_surat', $data);
        $this->load->view('layout/footer');
    }

    public function daftar_process()
    {
        $dep = [
            "tb_surat.status"=>"1",
            ];
        $data['view'] = $this->M_Surat->get_surat($dep)->result();
        // print_r ($dep);
        $this->header();
        $this->load->view('verifikator/daftar_surat', $data);
        $this->load->view('layout/footer');
    }

    public function daftar_approve()
    {
        $dep = [
            "tb_surat.status >"=>1,
            ];
        $data['view'] = $this->M_Surat->get_surat($dep)->result();
        // print_r ($dep);
        $this->header();
        $this->load->view('verifikator/daftar_surat', $data);
        $this->load->view('layout/footer');
    }

    public function delete_pengajuan(){
        $id = $this->input->post('id');
        $this->M_Surat->del_surat(array("id"=>$id));
        $this->M_Log->del_log(array("id_surat"=>$id));
        $this->M_Note->del_note(array("id_surat"=>$id));
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Pengajuan berhasil dihapus</div></div>');
        redirect(base_url('verifikator/daftar_total'));
    }

    public function edit_surat(){
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url('verifikator/daftar_total'));
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
        $this->load->view('verifikator/edit', $data);
        $this->load->view('layout/footer');
    }

    public function update_pengajuan()
    {
        $id = $this->input->post('id');
        // $departemen = $this->session->userdata('id');
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $catatan = $this->input->post('catatan');
        // $status = $this->input->post('status');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));

        $data = [
            'judul'=>"$judul",
            'to'=>"$to",
            'from'=>"$from",
            'body'=>"$isi",
            // 'tgl'=>$tgl,
            // 'id_operator'=>$this->session->userdata('operator'),
            // 'departemen'=>$departemen,
            // 'status'=>"$status",
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

        // if($status!="draft"){
        //     $log = [
        //         "id_surat"=>$id,
        //         "user"=>0,
        //         "round"=>0,
        //         "next_user"=>1,
        //         "status"=>1,
        //         "tgl"=>"$tgl"
        //     ];
        //     $log_cek = [
        //         "id_surat"=>$id,
        //         "user"=>0,
        //         "round"=>0,
        //         "next_user"=>1,
        //         "status"=>1,
        //         "round"=>0,
        //     ];
        //     $this->M_Log->log($log, $log_cek);
        // }
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Pengajuan berhasil ditambahkan, silahkan pilih "detail" untuk melihat progres</div></div>');
        redirect(base_url("verifikator/daftar_total"));

    }

    public function review(){
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url('/'));
        };
        $sent = ["tb_surat.id"=>$id];
        $cond_cat = ["tb_notes.id_surat"=>$id, "tb_notes.role"=>0];
        $id_sk = ["id_sk"=>$id];
        $data['surat'] = $this->M_Surat->get_where_surat($sent)->row();$dep = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>0))->row();
        $alur = $data['surat']->alur;
        if($alur == "1"){
            $spv = 3;
            $wd = 5;
        }else{
            $spv = 4;
            $wd = 7;
        }
        $dep = $this->M_Note->get_where_note(['id_surat'=>"$id"])->row();
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
        $supervisor = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>"$spv"))->result();
        if (!empty($supervisor)){
            $data['supervisor']=$supervisor;
        };
        $manager = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>5))->result();
        if (!empty($manager)){
           $data['manager']=$manager;
        };
        $wadek = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>"$wd"))->result();
        if (!empty($wadek)){
            $data['wadek']=$wadek;
        };
        $dekan = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>8))->result();
        if (!empty($dekan)){
            $data['dekan']=$dekan;
        };
        $this->id = "$id";
        $this->header();
        $this->log();
        $this->load->view('verifikator/review', $data);
        $this->load->view('layout/footer');
    }

    public function approve(){
        $id = $this->input->post('id');
        $catatan = $this->input->post('catatan');
        $alur = $this->input->post('alur');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));
        $round = $this->M_Log->get_round_log(array('id_surat'=>"$id",'next_user'=>2))->row()->round;
        $data_review = [
            "id_surat"=>$id,
            "role"=>2,
            "catatan"=>"$catatan",
            "tgl"=>"$tgl"
        ];
        $stat = [
            "alur"=>"$alur",
            "status"=>"2"
        ];
        $set = [
            "id_surat"=>$id
        ];
        $this->M_Surat->update_surat($stat, $id);
        $this->M_Note->insert_note($data_review);
        //log data
        $log = [
            "id_surat"=>$id,
            "user"=>2,
            "round"=>$round,
            "status"=>1,
            "next_user"=>3,
            "tgl"=>"$tgl"
        ];
        $log_cek = [
            "id_surat"=>$id,
            "user"=>2,
            "round"=>$round,
            "status"=>1,
            "next_user"=>3,
        ];
        $this->M_Log->log($log, $log_cek);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Draft berhasil disetujui, silahkan pilih "detail" untuk melihat progres</div></div>');
        redirect(base_url('/'));
    }

    public function reject(){
        $id = $this->input->post('id');
        $catatan = $this->input->post('catatan');
        $status = $this->input->post('status');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));
        $data_review = [
            "id_surat"=>$id,
            "role"=>2,
            "catatan"=>"$catatan",
            "tgl"=>"$tgl"
        ];
        $stat = [
            "status"=>"$status"
        ];
        $set = [
            "id_surat"=>$id
        ];
        $this->M_Surat->update_surat($stat, $id);
        $this->M_Note->insert_note($data_review);
        //log data
        $round = $this->M_Log->get_round_log(array('id_surat'=>"$id",'next_user'=>2))->row()->round;
        $log = [
             "id_surat"=>$id,
             "user"=>2,
             "round"=>((int)$round)+1,
             "status"=>0,
             "next_user"=>1,
             "tgl"=>"$tgl"
         ];
        $log_cek = [
             "id_surat"=>$id,
             "user"=>2,
             "round"=>((int)$round)+1,
             "status"=>0,
             "next_user"=>1,
        ];
        $this->M_Log->log($log, $log_cek);
        $this->session->set_flashdata('info', '<div class="alert alert-info" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Draft berhasil ditolak, silahkan pilih "detail" untuk melihat progres</div></div>');
        redirect(base_url('/'));
    }

    public function nomor(){
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url('/'));
        };
        $sent = ["tb_surat.id"=>$id];
        $cond_cat = ["tb_notes.id_surat"=>$id, "tb_notes.role"=>0];
        $id_sk = ["id_sk"=>$id];
        $data['surat'] = $this->M_Surat->get_where_surat($sent)->row();$dep = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>0))->row();
        $alur = $data['surat']->alur;
        if($alur == "1"){
            $spv = 3;
            $wd = 5;
        }else{
            $spv = 4;
            $wd = 7;
        }
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
        $supervisor = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>"$spv"))->result();
        if (!empty($supervisor)){
            $data['supervisor']=$supervisor;
        };
        $manager = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>5))->result();
        if (!empty($manager)){
           $data['manager']=$manager;
        };
        $wadek = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>"$wd"))->result();
        if (!empty($wadek)){
            $data['wadek']=$wadek;
        };
        $dekan = $this->M_Note->get_where_note(array('id_surat'=>"$id", 'role'=>8))->result();
        if (!empty($dekan)){
            $data['dekan']=$dekan;
        };
        $this->id = "$id";
        $this->header();
        $this->log();
        $this->load->view('verifikator/nomor', $data);
        $this->load->view('layout/footer');
    }

    public function insert_nomor()
    {
        $id = $this->input->post('id');
        // $departemen = $this->session->userdata('id');
        $nomor = $this->input->post('nomor');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));

        $data = [
            'nomor'=>"$nomor",
            "status"=>"7"
        ];
        $cond = ['id'=>$id];
        $this->M_Surat->update_pengajuan($data, $cond);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Nomor Suray berhasil ditambahkan, silahkan pilih "detail" untuk melihat progres</div></div>');
        redirect(base_url("verifikator/daftar_total"));

    }


}