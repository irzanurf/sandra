<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
require 'assets/H2OpenXml/HTMLtoOpenXML.php';
// use H2OpenXml\HTMLtoOpenXML;
// use H2OpenXml\src\HTMLtoOpenXML;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Element\AbstractElement;

function insertAtPosition($string, $insert, $position) {
    return implode($insert, str_split($string, $position));
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
    $pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil;
}
class Common extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if(empty($this->M_Login->is_role())){
            redirect("welcome/");
        }
        $this->load->helper('file');
        $this->load->model('M_Akun');
        $this->load->model('M_Surat');
        $this->load->model('M_Note');
        $this->load->model('M_Log');
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
        $dep = $this->M_Surat->get_where_surat(['tb_surat.id'=>"$id"])->row();
        $alur = $dep->alur;
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
    }


    public function detail(){
        $role = $this->session->userdata('role');
        $head['username'] = $this->session->userdata('username');
        $head['role'] = $role;
        $head['nama'] = $this->session->userdata('nama');
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url('/'));
        };
        $sent = ["tb_surat.id"=>$id];
        $cond_cat = ["tb_notes.id_surat"=>$id, "tb_notes.role"=>0];
        $id_sk = ["id_sk"=>$id];
        $surat = $this->M_Surat->get_where_surat($sent)->row();
        $data['surat'] = $surat;
        $alur = $surat->alur;
        $departemen = $surat->id_dep;
        // print_r()

        if($departemen!="0"){
            $kadep = $this->M_Akun->get_kadep(['tb_kadep.id'=>"$departemen"])->row();
            $kadep = $kadep->nama;
            $diajukan = "Diajukan oleh $kadep";
        }
        else {
            $diajukan = "";
        }

        if($alur == "1"){
            $spv = 3;
            $wd = 5;
            $cek_alur = "Akademik & Kemahasiswaan";
        }elseif($alur == "2"){
            $spv = 4;
            $wd = 7;
            $cek_alur = "Sumber Daya";
        }

        if(($surat->ttd)=="manager"){
            $data['jenis1'] = "Paraf";
            $data['jenis2'] = "Tanda Tangan";
            $data['jabatan1'] = "Supervisor $cek_alur";
            $data['jabatan2'] = "Manager";
            $data['diajukan'] = "$diajukan";
            $data['spv'] = $this->M_Log->get_or_last_log(['user'=>"3", 'status'=>"1", 'id_surat'=>"$id"], ['user'=>"4", 'status'=>"1", 'id_surat'=>"$id"])->row();
            $data['manager'] = $this->M_Log->get_last_log(array('user'=>"5", 'status'=>"1", 'id_surat'=>"$id"))->row();
        }
        elseif(($surat->ttd)=="wadek"){
            $data['jenis1'] = "Paraf";
            $data['jenis2'] = "Paraf";
            $data['jenis3'] = "Tanda Tangan";
            $data['jabatan1'] = "Supervisor $cek_alur";
            $data['jabatan2'] = "Manager";
            $data['jabatan3'] = "Wakil Dekan $cek_alur";
            $data['diajukan'] = "$diajukan";
            $data['spv'] = $this->M_Log->get_or_last_log(['user'=>"3", 'status'=>"1", 'id_surat'=>"$id"], ['user'=>"4", 'status'=>"1", 'id_surat'=>"$id"])->row();
            $data['manager'] = $this->M_Log->get_last_log(array('user'=>"5", 'status'=>"1", 'id_surat'=>"$id"))->row();
            $data['wadek'] = $this->M_Log->get_or_last_log(['user'=>"6", 'status'=>"1", 'id_surat'=>"$id"], ['user'=>"7", 'status'=>"1", 'id_surat'=>"$id"])->row();
        }
        elseif(($surat->ttd)=="dekan"){
            $data['jenis1'] = "Paraf";
            $data['jenis2'] = "Paraf";
            $data['jenis3'] = "Tanda Tangan";
            $data['jabatan1'] = "Manager";
            $data['jabatan2'] = "Wakil Dekan $cek_alur";
            $data['jabatan3'] = "Dekan";
            $data['diajukan'] = "$diajukan";
            $data['manager'] = $this->M_Log->get_last_log(array('user'=>"5", 'status'=>"1", 'id_surat'=>"$id"))->row();
            $data['wadek'] = $this->M_Log->get_or_last_log(['user'=>"6", 'status'=>"1", 'id_surat'=>"$id"], ['user'=>"7", 'status'=>"1", 'id_surat'=>"$id"])->row();
            $data['dekan'] = $this->M_Log->get_last_log(array('user'=>"8", 'status'=>"1", 'id_surat'=>"$id"))->row();
            // print_r( $data['dekan']);
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
        $this->load->view('layout/header', $head);
        $this->id = "$id";
        $this->log();
        $this->load->view('detail', $data);
        $this->load->view('layout/footer');
    }
    
    public function create_sk($id){
        // $this->load->library('htmlpdf');
        // $this->load->library('Good_good');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        // $id = $this->input->post('id');
        $sent = ["tb_sk.id"=>$id];
        $id_sk = ["id_sk"=>$id];
        $menimbang = $this->M_SK->get_menimbang($id_sk)->result();
        $mengingat = $this->M_SK->get_mengingat($id_sk)->result();
        $menetapkan = $this->M_SK->get_menetapkan($id_sk)->result();
        $sk = $this->M_SK->get_SK($sent)->row();
        $file_name = $sk->file;
        echo "$file_name";
        unlink("assets/file/".$file_name);
        $judul = str_replace('&', '&amp;', strtoupper($sk->judul));
        $no_sk = str_replace('&', '&amp;', "$sk->no_sk");
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/template.docx');
        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(false);
            $templateProcessor->setValues([
                'no_sk' => "$no_sk",
                'judul' => strip_tags($judul),
                'departemen' => ucwords($sk->departemen)
                ]);
                $num_menimbang = "a";
                $num_mengingat = "1";
                $num_menetapkan = "1";
                $count_a = count($menimbang);
                $templateProcessor->cloneRow('a', $count_a);
                for($i=1; $i<=$count_a; $i++){
                    $val_menimbang = str_replace('&', '&amp;', $menimbang[$i-1]->menimbang);
                    $val_menimbang = str_replace('<p>', '', $val_menimbang);
                    $val_menimbang = str_replace('</p>', '', $val_menimbang);
                    $val_menimbang = str_replace('<ol>', '', $val_menimbang);
                    $val_menimbang = str_replace('</ol>', '', $val_menimbang);
                    $val_menimbang = str_replace('<strong>', '<b>', $val_menimbang);
                    $val_menimbang = str_replace('</strong>', '</b>', $val_menimbang);
                    $val_menimbang = str_replace('<li>', '<br>     ', $val_menimbang);
                    $val_menimbang = str_replace('</li>', '', $val_menimbang);	
                    $val_menimbang1 = HTMLtoOpenXML::getInstance()->fromHTML("$val_menimbang");
		            $val_menimbang2 = str_replace('&nbsp;', ' ', $val_menimbang1);
                    $set_menimbang = "$num_menimbang.";
                    $templateProcessor->setValue('a#'."$i",  "$set_menimbang", 1);
                    $templateProcessor->setValue('menimbang#'."$i",  "$val_menimbang2", 1);
                    $num_menimbang++;
                };

                $count_b = count($mengingat);
                $templateProcessor->cloneRow('b', $count_b);
                for($j=1; $j<=$count_b; $j++){
                    $val_mengingat = str_replace('&', '&amp;', $mengingat[$j-1]->mengingat);
                    
                    $val_mengingat = str_replace('<p>', '', $val_mengingat);
                    $val_mengingat = str_replace('</p>', '', $val_mengingat);
                    $val_mengingat = str_replace('<ol>', '', $val_mengingat);
                    $val_mengingat = str_replace('</ol>', '', $val_mengingat);
                    $val_mengingat = str_replace('<strong>', '<b>', $val_mengingat);
                    $val_mengingat = str_replace('</strong>', '</b>', $val_mengingat);
                    $val_mengingat = str_replace('<li>', '<br>     ', $val_mengingat);
                    $val_mengingat = str_replace('</li>', '', $val_mengingat);

                    $val_mengingat1 = HTMLtoOpenXML::getInstance()->fromHTML("$val_mengingat");
		            $val_mengingat2 = str_replace('&nbsp;', ' ', $val_mengingat1);
                    $set_mengingat = "$num_mengingat.";
                    $templateProcessor->setValue('b#'."$j",  "$set_mengingat", 1);
                    $templateProcessor->setValue('mengingat#'."$j",  "$val_mengingat2", 1);
                    $num_mengingat++;
                };

                $count_c = count($menetapkan);
                $templateProcessor->cloneRow('c', $count_c);
                for($k=1; $k<=$count_c; $k++){
                    $val_menetapkan = str_replace('&', '&amp;', $menetapkan[$k-1]->menetapkan);
		    
                    $val_menetapkan = str_replace('<p>', '', $val_menetapkan);
                    $val_menetapkan = str_replace('</p>', '', $val_menetapkan);
                    $val_menetapkan = str_replace('<ol>', '', $val_menetapkan);
                    $val_menetapkan = str_replace('</ol>', '', $val_menetapkan);
                    $val_menetapkan = str_replace('<strong>', '<b>', $val_menetapkan);
                    $val_menetapkan = str_replace('</strong>', '</b>', $val_menetapkan);
                    $val_menetapkan = str_replace('<li>', '<br>     ', $val_menetapkan);
                    $val_menetapkan = str_replace('</li>', '', $val_menetapkan);
		    
                    // $val_menetapkan = str_replace('<i><strong><u>', "<w:r><w:rPr><w:i/><w:b/><w:u w:val='single'/></w:rPr><w:t>", $val_menetapkan);
                    // $val_menetapkan = str_replace('</i></strong></u>', '</w:t></w:r>', $val_menetapkan);
                    // $val_menetapkan = str_replace('<i><strong>', '<w:r><w:rPr><w:i/><w:b/></w:rPr><w:t>', $val_menetapkan);
                    // $val_menetapkan = str_replace('</i></strong>', '</w:t></w:r>', $val_menetapkan);
                    // $val_menetapkan = str_replace('<strong><u>', "<w:r><w:rPr><w:b/><w:u w:val='single'/></w:rPr><w:t>", $val_menetapkan);
                    // $val_menetapkan = str_replace('</strong></u>', '</w:t></w:r>', $val_menetapkan);
                    // $val_menetapkan = str_replace('<i><u>', "<w:r><w:rPr><w:i/><w:u w:val='single'/></w:rPr><w:t>", $val_menetapkan);
                    // $val_menetapkan = str_replace('</i></u>', '</w:t></w:r>', $val_menetapkan);
                    // $val_menetapkan = str_replace('<strong>', '<w:r><w:rPr><w:b/></w:rPr><w:t>', $val_menetapkan);
                    // $val_menetapkan = str_replace('</strong>', '</w:t></w:r>', $val_menetapkan);
                    // $val_menetapkan = str_replace('<i>', '<w:r><w:rPr><w:i/></w:rPr><w:t>', $val_menetapkan);
                    // $val_menetapkan = str_replace('</i>', '</w:t></w:r>', $val_menetapkan);
                    // $val_menetapkan = str_replace('<u>', "<w:r><w:rPr><w:u w:val='single'/></w:rPr><w:t>", $val_menetapkan);
                    // $val_menetapkan = str_replace('</u>', '</w:t></w:r>', $val_menetapkan);
                    // $val_menetapkan = str_replace('<i>', '<w:r><w:rPr><w:i/></w:rPr><w:t>', $val_menetapkan);
                    // $val_menetapkan = str_replace('</i>', '</w:t></w:r>', $val_menetapkan);
                    $num_new = strtoupper(terbilang($num_menetapkan));
                    $set_menetapkan = "KE$num_new";
                    $val_menetapkan1 = HTMLtoOpenXML::getInstance()->fromHTML("$val_menetapkan");
	     	        $val_menetapkan2 = str_replace('&nbsp;', ' ', $val_menetapkan1);
                    // $val_menetapkan1 = str_replace("xml:space='preserve'", '', $val_menetapkan1);
                    $templateProcessor->setValue('c#'."$k",  "$set_menetapkan", 1);
                    $templateProcessor->setValue('menetapkan#'."$k", $val_menetapkan2, 1);
                    // $templateProcessor->setValue('menetapkan#'."$k", htmlentities("$val_menetapkan1"), 1);
                    $num_menetapkan++;
                };
                $rand = rand();
                $title = MD5("$id"."$rand");
                \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
                $templateProcessor->saveAs('assets/file/'."$title".'.docx');
                $datafile = [
                    "file"=>"$title".".docx",];
                    // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $cond = ['id'=>$id];
                $this->M_SK->update_pengajuan($datafile, $cond);
                $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
                <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Proses berhasil, silahkan pilih "detail" untuk melihat progres</div></div>');
                redirect(base_url('/'));
    }

    public function download_sk(){
        // $this->load->library('htmlpdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        $id = $this->input->post('id');
        $sent = ["tb_sk.id"=>$id];
        $id_sk = ["id_sk"=>$id];
        $menimbang = $this->M_SK->get_menimbang($id_sk)->result();
        $mengingat = $this->M_SK->get_mengingat($id_sk)->result();
        $menetapkan = $this->M_SK->get_menetapkan($id_sk)->result();
        $sk = $this->M_SK->get_SK($sent)->row();
        $judul = str_replace('&', '&amp;', strtoupper($sk->judul));
        $no_sk = str_replace('&', '&amp;', "$sk->no_sk");
        $tgl_new = date('Y-m-d', strtotime($sk->tgl_sk));
        $tgl_sk = tgl_indo($tgl_new);
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/template.docx');
            $templateProcessor->setValues([
                'no_sk' => "$no_sk",
                'judul' => strip_tags($judul),
                'departemen' => ucwords($sk->departemen),
                'tgl_sk' => "$tgl_sk",
                ]);
                $num_menimbang = "a";
                $num_mengingat = "1";
                $num_menetapkan = "1";
                $count_a = count($menimbang);
                $templateProcessor->cloneRow('a', $count_a);
                for($i=1; $i<=$count_a; $i++){
                    $val_menimbang = str_replace('&', '&amp;', $menimbang[$i-1]->menimbang);
		    
                    $val_menimbang = str_replace('<p>', '', $val_menimbang);
                    $val_menimbang = str_replace('</p>', '', $val_menimbang);
                    $val_menimbang = str_replace('<ol>', '', $val_menimbang);
                    $val_menimbang = str_replace('</ol>', '', $val_menimbang);
                    $val_menimbang = str_replace('<strong>', '<b>', $val_menimbang);
                    $val_menimbang = str_replace('</strong>', '</b>', $val_menimbang);
                    $val_menimbang = str_replace('<li>', '<br>     ', $val_menimbang);
                    $val_menimbang = str_replace('</li>', '', $val_menimbang);
		    $val_menimbang = str_replace('&nbsp;', ' ', $val_menimbang);
                    $val_menimbang1 = HTMLtoOpenXML::getInstance()->fromHTML("$val_menimbang");
                    $set_menimbang = "$num_menimbang.";
                    $templateProcessor->setValue('a#'."$i",  "$set_menimbang", 1);
                    $templateProcessor->setValue('menimbang#'."$i",  "$val_menimbang1", 1);
                    $num_menimbang++;
                };

                $count_b = count($mengingat);
                $templateProcessor->cloneRow('b', $count_b);
                for($j=1; $j<=$count_b; $j++){
                    $val_mengingat = str_replace('&', '&amp;', $mengingat[$j-1]->mengingat);
		    
                    $val_mengingat = str_replace('<p>', '', $val_mengingat);
                    $val_mengingat = str_replace('</p>', '', $val_mengingat);
                    $val_mengingat = str_replace('<ol>', '', $val_mengingat);
                    $val_mengingat = str_replace('</ol>', '', $val_mengingat);
                    $val_mengingat = str_replace('<strong>', '<b>', $val_mengingat);
                    $val_mengingat = str_replace('</strong>', '</b>', $val_mengingat);
                    $val_mengingat = str_replace('<li>', '<br>     ', $val_mengingat);
                    $val_mengingat = str_replace('</li>', '', $val_mengingat);
		    $val_mengingat = str_replace('&nbsp;', ' ', $val_mengingat);
                    $val_mengingat1 = HTMLtoOpenXML::getInstance()->fromHTML("$val_mengingat");
                    $set_mengingat = "$num_mengingat.";
                    $templateProcessor->setValue('b#'."$j",  "$set_mengingat", 1);
                    $templateProcessor->setValue('mengingat#'."$j",  "$val_mengingat1", 1);
                    $num_mengingat++;
                };

                $count_c = count($menetapkan);
                $templateProcessor->cloneRow('c', $count_c);
                for($k=1; $k<=$count_c; $k++){
                    $val_menetapkan = str_replace('&', '&amp;', $menetapkan[$k-1]->menetapkan);
		    
                    $val_menetapkan = str_replace('<p>', '', $val_menetapkan);
                    $val_menetapkan = str_replace('</p>', '', $val_menetapkan);
                    $val_menetapkan = str_replace('<ol>', '', $val_menetapkan);
                    $val_menetapkan = str_replace('</ol>', '', $val_menetapkan);
                    $val_menetapkan = str_replace('<strong>', '<b>', $val_menetapkan);
                    $val_menetapkan = str_replace('</strong>', '</b>', $val_menetapkan);
                    $val_menetapkan = str_replace('<li>', '<br>     ', $val_menetapkan);
                    $val_menetapkan = str_replace('</li>', '', $val_menetapkan);
		    $val_menetapkan = str_replace('&nbsp;', ' ', $val_menetapkan);
                    $num_new = strtoupper(terbilang($num_menetapkan));
                    $set_menetapkan = "KE$num_new";
                    $val_menetapkan1 = HTMLtoOpenXML::getInstance()->fromHTML("$val_menetapkan");
                    $templateProcessor->setValue('c#'."$k",  "$set_menetapkan", 1);
                    $templateProcessor->setValue('menetapkan#'."$k",  "$val_menetapkan1", 1);
                    $num_menetapkan++;
                };

                $title = MD5("$judul"."$id");
                ob_clean();
                header("Content-Disposition: attachment; filename=$title.docx");
        
                $templateProcessor->saveAs('php://output');
                
                exit;
                redirect(base_url('/'));
    }
}