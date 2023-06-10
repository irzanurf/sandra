<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Log extends CI_Model
{
    public function log($log, $log_cek){
        $query = $this->db->select('*')
        ->from('tb_logs')
        ->where($log_cek)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_logs',$log);
        }
        else{
            $this->db->where($log_cek);
            $this->db->update('tb_logs',$log);
        }   
    }

    public function get_log($data){
        $query = $this->db->select('*')
        ->from('tb_logs')
        ->where($data)
        ->order_by('round','asc')
        ->get();
        return $query;
    }

    public function get_last_log($data){
        $query = $this->db->select('*')
        ->from('tb_logs')
        ->where($data)
        ->order_by('round','desc')
        ->limit(1)
        ->get();
        return $query;
    }

    public function get_or_last_log($data, $data2){
        $query = $this->db->select('*')
        ->from('tb_logs')
        ->where($data)
        ->or_where($data2)
        ->order_by('round','desc')
        ->limit(1)
        ->get();
        return $query;
    }

    public function get_log_c($data, $cek){
        $query = $this->db->select('*')
        ->from('tb_logs')
        ->where($data)
        ->or_where('user', "$cek")
        ->order_by('round','asc')
        ->get();
        return $query;
    }

    public function del_log($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_logs');
    }

    public function get_round_log(array $data){
        $query = $this->db->select('*')
        ->from('tb_logs')
        ->where($data)
        ->order_by('round','desc')
        ->limit(1)
        ->get();
        return $query;
    }

}