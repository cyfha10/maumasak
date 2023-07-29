<?php

class Dashboard_model extends CI_Model
{
  
    public function data_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function customer_grafik()
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->join('m_customer_detail', 'm_customer.customer_id = m_customer_detail.customer_id', 'INNER');
        $query = $this->db->get();
        return $query->result_array();
    }

}