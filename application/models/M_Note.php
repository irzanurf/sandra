<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Note extends CI_Model
{
    public function insert_note($data){
        // $this->db->insert('tb_note_kadep',$data_review);
        $query = $this->db->select('*')
        ->from('tb_notes')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_notes',$data);
        }
        else{

        }   
    }

    public function update_note($data, $cond)
    {
        $this->db->where($cond);
        $this->db->update('tb_notes', $data);
    }

    public function get_where_note($cond)
    {
        $query = $this->db->select('tb_notes.*')
        ->from('tb_notes')
        ->where($cond)
        ->get();
        return $query;
    }

    public function get_where_note_c($cond, $as)
    {
        $query = $this->db->select('tb_notes.*')
        ->from('tb_notes')
        ->where($cond)
        ->or_where($as)
        ->get();
        return $query;
    }

    public function del_note($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_notes');
    }

}