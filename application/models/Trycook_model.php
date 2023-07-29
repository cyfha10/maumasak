<?php

class Trycook_model extends CI_Model
{
  
    public function data_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_all_trycook()
    {
        $query = $this->db->query("SELECT m_mpasi_trycook.mpasi_trycook_id, m_mpasi_trycook.customer_id, m_customer.fullname, m_mpasi_trycook.trycook_image, m_mpasi_trycook.description, m_mpasi_trycook.is_active, m_mpasi.mpasi_id, m_mpasi.title, m_mpasi.cover_image FROM m_mpasi_trycook INNER JOIN m_mpasi ON m_mpasi_trycook.mpasi_id = m_mpasi.mpasi_id INNER JOIN m_customer ON m_mpasi_trycook.customer_id = m_customer.customer_id")->result_array();
        return $query;
    }

    public function trycook_recipe()
    {
        $query = $this->db->query("SELECT m_trycook.trycook_id, m_trycook.customer_id, m_customer.fullname, m_trycook.trycook_image, m_trycook.description, m_trycook.is_active, m_recipe.recipe_id, m_recipe.title, m_recipe.cover_image FROM m_trycook INNER JOIN m_recipe ON m_trycook.recipe_id = m_recipe.recipe_id INNER JOIN m_customer ON m_trycook.customer_id = m_customer.customer_id")->result_array();
        return $query;
    }

    

}