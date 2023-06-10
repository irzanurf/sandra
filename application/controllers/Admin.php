<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "1"){
            redirect("welcome/");
        }
        $this->load->helper('file');
        $this->load->model('M_Akun');
        $this->load->model('M_SK');
    }

    public function index(){
        redirect(base_url('admin/daftar_sk'));
    }

    public function header(){
        $head['username'] = $this->session->userdata('username');
        $head['role'] = $this->session->userdata('role');
        $head['nama'] = $this->session->userdata('nama');
        $head['one1'] = $this->M_SK->get_count_sk();
        $head['one2'] = "Total diajukan";
        $head['one3'] = "admin/all";
        $head['two1'] = $this->M_SK->get_count_sk_diproses(array("status <"=>10));
        $head['two2'] = "Harus Segera diproses";
        $head['three1'] = $this->M_SK->get_count_sk_disetujui(array("status >"=>9));
        $head['three2'] = "Total disetujui";
        $head['three3'] = "admin/total";
        $this->load->view('layout/header_admin', $head);
    }

    public function daftar_sk(){
        $data['view'] = $this->M_SK->get_all_sk(0)->result();
        $this->header();
        $this->load->view('admin/daftar_sk', $data);
        $this->load->view('layout/footer_admin');
    }

    // public function detail(){
    //     $head['username'] = $this->session->userdata('username');
    //     $head['role'] = $this->session->userdata('role');
    //     $head['nama'] = $this->session->userdata('nama');
    //     $id = $this->input->post('id');
    //     if (empty($id)){
    //         redirect(base_url('/'));
    //     };
    //     $sent = ["tb_sk.id"=>$id];
    //     $id_sk = ["id_sk"=>$id];
    //     $data['menimbang'] = $this->M_SK->get_menimbang($id_sk)->result();
    //     $data['mengingat'] = $this->M_SK->get_mengingat($id_sk)->result();
    //     $data['menetapkan'] = $this->M_SK->get_menetapkan($id_sk)->result();
    //     $data['sk'] = $this->M_SK->get_SK($sent)->row();
    //     $kadep = $this->M_SK->get_note_kadep($id_sk)->row();
    //     if (!empty($kadep)){
    //         $data['kadep']=$kadep->catatan;
    //     };
    //     $verifikator = $this->M_SK->get_note_verifikator($id_sk)->row();
    //     if (!empty($verifikator)){
    //         $data['verifikator']=$verifikator->catatan;
    //     };
    //     $supervisor = $this->M_SK->get_note_supervisor($id_sk)->row();
    //     if (!empty($supervisor)){
    //         $data['supervisor']=$supervisor->catatan;
    //     };
    //     $manager = $this->M_SK->get_note_manager($id_sk)->row();
    //     if (!empty($manager)){
    //         $data['manager']=$manager->catatan;
    //     };
    //     $wadek1 = $this->M_SK->get_note_wadek1($id_sk)->row();
    //     if (!empty($wadek1)){
    //         $data['wadek1']=$wadek1->catatan;
    //     };
    //     $wadek2 = $this->M_SK->get_note_wadek2($id_sk)->row();
    //     if (!empty($wadek2)){
    //         $data['wadek2']=$wadek2->catatan;
    //     };
    //     $dekan = $this->M_SK->get_note_dekan($id_sk)->row();
    //     if (!empty($dekan)){
    //         $data['dekan']=$dekan->catatan;
    //     };
    //     $head['one1'] = $this->M_SK->get_count_sk();
    //     $head['one2'] = "Total diajukan";
    //     $head['two1'] = $this->M_SK->get_count_sk_diproses(array("status <"=>7));
    //     $head['two2'] = "Total diproses";
    //     $head['three1'] = $this->M_SK->get_count_sk_disetujui();
    //     $head['three2'] = "Total disetujui";
    //     $this->load->view('layout/header_admin', $head);
    //     $this->load->view('detail', $data);
    //     $this->load->view('layout/footer_admin');
    // }

    public function edit_sk(){
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url('admin/daftar_sk'));
        };
        $sent = ["tb_sk.id"=>$id];
        $id_sk = ["id_sk"=>$id];
        $data["id"] = $id;
        $data['menimbang'] = $this->M_SK->get_menimbang($id_sk)->result();
        $data['mengingat'] = $this->M_SK->get_mengingat($id_sk)->result();
        $data['menetapkan'] = $this->M_SK->get_menetapkan($id_sk)->result();
        $data['sk'] = $this->M_SK->get_SK($sent)->row();
        $dep = ["tb_sk.departemen"=>$this->session->userdata('id')];
        $head['one1'] = $this->M_SK->get_count_sk();
        $head['one2'] = "Total diajukan";
        $head['two1'] = $this->M_SK->get_count_sk_diproses(array("status <"=>7));
        $head['two2'] = "Total diproses";
        $head['three1'] = $this->M_SK->get_count_sk_disetujui();
        $head['three2'] = "Total disetujui";
        $kadep = $this->M_SK->get_note_kadep($id_sk)->row();
        if (!empty($kadep)){
            $data['kadep']=$kadep;
        };
        $verifikator = $this->M_SK->get_note_verifikator($id_sk)->row();
        if (!empty($verifikator)){
            $data['verifikator']=$verifikator;
        };
        $supervisor = $this->M_SK->get_note_supervisor($id_sk)->row();
        if (!empty($supervisor)){
            $data['supervisor']=$supervisor;
        };
        $manager = $this->M_SK->get_note_manager($id_sk)->row();
        if (!empty($manager)){
            $data['manager']=$manager;
        };
        $wadek1 = $this->M_SK->get_note_wadek1($id_sk)->row();
        if (!empty($wadek1)){
            $data['wadek1']=$wadek1;
        };
        $wadek2 = $this->M_SK->get_note_wadek2($id_sk)->row();
        if (!empty($wadek2)){
            $data['wadek2']=$wadek2;
        };
        $dekan = $this->M_SK->get_note_dekan($id_sk)->row();
        if (!empty($dekan)){
            $data['dekan']=$dekan;
        };
        $log_dep = $this->M_SK->get_log(array("id_sk"=>$id, "user"=>0))->result();
        $log_kadep = $this->M_SK->get_log(array("id_sk"=>$id, "user"=>1))->result();
        $log_ver = $this->M_SK->get_log(array("id_sk"=>$id, "user"=>2))->result();
        $log_sup = $this->M_SK->get_log(array("id_sk"=>$id, "user"=>3))->result();
        $log_man = $this->M_SK->get_log(array("id_sk"=>$id, "user"=>4))->result();
        $log_wad1 = $this->M_SK->get_log(array("id_sk"=>$id, "user"=>5))->result();
        $log_wad2 = $this->M_SK->get_log(array("id_sk"=>$id, "user"=>6))->result();
        $log_dekan = $this->M_SK->get_log(array("id_sk"=>$id, "user"=>7))->result();
        $log_finish = $this->M_SK->get_log(array("id_sk"=>$id, "next_user"=>8))->result();
        $data['log_finish'] = $log_finish;
        $data['log_departemen'] = $log_dep;
        $data['log_kadep'] = $log_kadep;
        $data['log_verifikator'] = $log_ver;
        $data['log_supervisor'] = $log_sup;
        $data['log_manager'] = $log_man;
        $data['log_wadek1'] = $log_wad1;
        $data['log_wadek2'] = $log_wad2;
        $data['log_dekan'] = $log_dekan;
        $this->load->view('layout/header_admin', $head);
        $this->load->view('admin/edit', $data);
        $this->load->view('layout/footer_admin');
    }

    public function update_pengajuan(){
        $id = $this->input->post('id');
        $departemen = $this->session->userdata('id');
        $judul = $this->input->post('judul');
        $catatan = $this->input->post('catatan');
        // $kategori = $this->input->post('kategori');
        $mengingat = $this->input->post('mengingat[]');
        $menimbang = $this->input->post('menimbang[]');
        $menetapkan = $this->input->post('menetapkan[]');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));
        $data = [
            'tgl'=>$tgl,
            'judul'=>$judul,
            // 'kategori'=>$kategori,
            // 'departemen'=>$departemen,
            // 'status'=>0,
        ];
        $cond = ['id'=>$id];
        $id_sk = ['id_sk'=>$id];
        $this->M_SK->update_pengajuan($data, $cond);

        $data_review = [
            "id_sk"=>$id,
            "catatan"=>"$catatan",
            "tgl"=>"$tgl"
        ];
        $this->M_SK->insert_dep_cat($data_review, $cond);

        $this->M_SK->del_mengingat($id_sk);
        // $data_mengingat = array();
        for($i=0; $i<count($mengingat)-1; $i++)
        {
            if($mengingat[$i]!=""||$mengingat[$i]!=null||$mengingat[$i]!=0){
                $data_mengingat[$i] = [
                    'id_sk' => $id,
                    'mengingat' => $mengingat[$i],
                ];
                $this->M_SK->mengingat($data_mengingat[$i]);

            }
            else{
        }
        }
        

        $this->M_SK->del_menimbang($id_sk);
        // $data_menimbang = array();
        for($i=0; $i<count($menimbang)-1; $i++)
        {
            if($menimbang[$i]!=""||$menimbang[$i]!=null||$menimbang[$i]!=0){
                $data_menimbang[$i] = [
                    'id_sk' => $id,
                    'menimbang' => $menimbang[$i],
                ];
                $this->M_SK->menimbang($data_menimbang[$i]);

            }
            else{
        }
        }
       

        $this->M_SK->del_menetapkan($id_sk);
        // $data_menetapkan = array();
        for($i=0; $i<count($menetapkan)-1; $i++)
        {
            if($menetapkan[$i]!=""||$menetapkan[$i]!=null||$menetapkan[$i]!=0){
                $data_menetapkan[$i] = [
                    'id_sk' => $id,
                    'menetapkan' => $menetapkan[$i],
                ];
                $this->M_SK->menetapkan($data_menetapkan[$i]);
            }
            else{
        }
        }

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
            $this->M_SK->update_pengajuan($datafile, $cond);
        }
        
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Pengajuan berhasil ditambahkan, silahkan pilih "detail" untuk melihat progres</div></div>');
        redirect(base_url('admin/daftar_sk'));
    }
    
    public function delete_pengajuan(){
        $id = $this->input->post('id');
        $this->M_SK->del_mengingat(array("id_sk"=>$id));
        $this->M_SK->del_menimbang(array("id_sk"=>$id));
        $this->M_SK->del_menetapkan(array("id_sk"=>$id));
        $this->M_SK->del_sk(array("id"=>$id));
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Pengajuan berhasil dihapus</div></div>');
        redirect(base_url('admin/daftar_sk'));
    }

    public function user(){
        $data['view'] = $this->M_Akun->get_user()->result();
        $this->header();
        $this->load->view('admin/user', $data);
        $this->load->view('layout/footer_admin');
    }

    public function akun(){
        $username = $this->input->post('username');
        if (empty($username)){
            redirect(base_url('admin/user'));
        };
        $data['v'] = $this->M_Akun->getwhere_user($username)->row();
        $head['one1'] = $this->M_SK->get_count_sk();
        $head['one2'] = "Total diajukan";
        $head['two1'] = $this->M_SK->get_count_sk_diproses(array("status <"=>7));
        $head['two2'] = "Total diproses";
        $head['three1'] = $this->M_SK->get_count_sk_disetujui();
        $head['three2'] = "Total disetujui";
        $this->load->view('layout/header_admin', $head);
        $this->load->view('admin/akun', $data);
        $this->load->view('layout/footer_admin');
    }

    public function ganti_password(){
        $username = $this->input->post('username');
        $password = $this->input->post('pass');
        $password = md5("$password");
        $data = [
            'password'=>"$password",
        ];
        $this->M_Akun->changePass($username, $data);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Password berhasil diperbarui</div></div>');
        redirect(base_url('admin/user'));
    }

    public function update_status(){
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));
        $stat = [
            "status"=>(int)$status
        ];
        $this->M_SK->update_sk($stat, $id);
        //log data
        $round = $this->M_SK->get_round_log(array('id_sk'=>"$id"))->row()->round;
        print_r($round);
        $log = [
             "id_sk"=>$id,
             "user"=>2,
             "round"=>((int)$round)+1,
             "status"=>0,
             "next_user"=>((int)$status)+1,
             "tgl"=>"$tgl"
         ];
        $log_cek = [
             "id_sk"=>$id,
             "user"=>2,
             "round"=>((int)$round)+1,
             "status"=>0,
             "next_user"=>((int)$status)+1,
        ];
        $this->M_SK->log($log, $log_cek);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> <i>FORCE ACTION</i> berhasil dilakukan, silahkan pilih "detail" untuk melihat progres</div></div>');
        redirect(base_url('admin/daftar_sk'));
    }

}