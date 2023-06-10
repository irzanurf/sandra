<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Surat extends CI_Model
{
    public function get_all_surat()
    {
        $query = $this->db->select('tb_surat.*, tb_departemen.departemen, tb_users.nama')
        ->from('tb_surat')
        ->join('tb_departemen','tb_surat.departemen=tb_departemen.id','inner')
        ->join('tb_users','tb_surat.id_operator=tb_users.id','inner')
        ->order_by('tgl','desc')
        ->get();
        return $query;
    }

    public function get_surat($cond)
    {
        $query = $this->db->select('tb_surat.*, tb_departemen.departemen, tb_departemen.id as id_dep, tb_users.nama')
        ->from('tb_surat')
        ->join('tb_departemen','tb_surat.departemen=tb_departemen.id','inner')
        ->join('tb_users','tb_surat.id_operator=tb_users.id','inner')
        ->where($cond)
        ->order_by('tgl','desc')
        ->get();
        return $query;
    }

    public function get_where_surat($cond)
    {
        $query = $this->db->select('tb_surat.*, tb_departemen.departemen, tb_departemen.id as id_dep, tb_users.nama')
        ->from('tb_surat')
        ->join('tb_departemen','tb_surat.departemen=tb_departemen.id','inner')
        ->join('tb_users','tb_surat.id_operator=tb_users.id','inner')
        ->where($cond)
        ->get();
        return $query;
    }

    public function insert_pengajuan($data)
    {
        $this->db->insert('tb_surat',$data);
        return $this->db->insert_id();
    }

    public function update_pengajuan($data, $cond)
    {
        $this->db->where($cond);
        $this->db->update('tb_surat', $data);
    }

    public function del_surat($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_surat');
    }

    public function update_surat($stat, $id){
        $this->db->where('id',"$id");
        $this->db->update('tb_surat', $stat);
    }

}