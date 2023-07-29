<?php

class Withdraw_model extends CI_Model
{
  
    public function data_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_withdraw()
    {
        $query = $this->db->query("SELECT a.withdraw_id, a.customer_id, b.fullname,  a.transfer_date, a.nominal, e.bank_name, c.account_number, c.account_name, d.withdraw_status_id, d.withdraw_status FROM tx_withdraw a INNER JOIN m_customer b ON a.customer_id = b.customer_id INNER JOIN m_customer_bank c ON a.customer_bank_id = c.customer_bank_id INNER JOIN m_withdraw_status d ON a.withdraw_status_id = d.withdraw_status_id INNER JOIN m_bank e ON c.bank_id = e.bank_id WHERE a.withdraw_status_id = 'WT001' or a.withdraw_status_id = 'WT002'")->result_array();
        return $query;

        return $this->db->get()->result_array();
    }

    public function get_withdraw_history()
    {
        $query = $this->db->query("SELECT a.withdraw_id, a.customer_id, b.fullname,  a.transfer_date, a.nominal, e.bank_name, c.account_number, c.account_name, d.withdraw_status_id, d.withdraw_status FROM tx_withdraw a INNER JOIN m_customer b ON a.customer_id = b.customer_id INNER JOIN m_customer_bank c ON a.customer_bank_id = c.customer_bank_id INNER JOIN m_withdraw_status d ON a.withdraw_status_id = d.withdraw_status_id INNER JOIN m_bank e ON c.bank_id = e.bank_id WHERE a.withdraw_status_id != 'WT001'")->result_array();
        return $query;

        return $this->db->get()->result_array();
    }

    public function get_customer_detail($customer_id)
    {
        $this->db->select('*');
        $this->db->from('m_customer_detail');
        $this->db->where("is_loggedin",1);
        $this->db->where("customer_id",$customer_id);

        return $this->db->get()->result_array();
    }
    

}