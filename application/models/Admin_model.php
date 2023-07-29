<?php

class Admin_model extends CI_Model
{
  
    public function data_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function data_admin($email)
    {
        $this->db->select('*');
        $this->db->from('m_admin');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row();
    }

    function updateadmins($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('admin_id',$id); 
        $this->db->update('m_admin',$data);

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return FALSE;
        }
        else
        {
                $this->db->trans_commit();
                return TRUE;
        }
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
    }

}