<?php

class Mpasi_model extends CI_Model
{
  
    public function data_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function m_mpasi_join()
    {
        $this->db->select('*');
        $this->db->from('m_mpasi');
        $this->db->join('m_customer', 'm_mpasi.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where('m_mpasi.recipe_status_id', 2);
        $this->db->where('m_mpasi.is_active', 1); 
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_mpasi_join_sale()
    {
        $this->db->select('*');
        $this->db->from('m_mpasi');
        $this->db->join('m_customer', 'm_mpasi.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where('m_mpasi.recipe_status_id', 2);
        $this->db->where('m_mpasi.is_active', 1); 
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_mpasi_all()
    {
        $this->db->select('*');
        $this->db->from('m_mpasi');
        $this->db->join('m_customer', 'm_mpasi.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where('m_mpasi.is_active', 1);        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_mpasi_join_filter($filter)
    {
        $this->db->select('*');
        $this->db->from('m_mpasi');
        $this->db->join('m_customer', 'm_mpasi.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where('m_mpasi.recipe_status_id', $filter);
        $this->db->where('m_mpasi.is_active', 1);        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_recipes_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_mpasi');
        $this->db->join('m_customer', 'm_mpasi.customer_id = m_customer.customer_id', 'INNER');
        $this->db->join('m_recipe_status', 'm_mpasi.recipe_status_id = m_recipe_status.recipe_status_id', 'INNER');
        $this->db->where("m_mpasi.mpasi_id",$id);

        return $this->db->get()->row();
    }

    public function get_recipekomen_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_mpasi_comment');
        $this->db->join('m_customer', 'm_mpasi_comment.customer_id = m_customer.customer_id', 'INNER');
        $this->db->join('m_mpasi', 'm_mpasi_comment.mpasi_id = m_mpasi.mpasi_id', 'INNER');
        $this->db->where("m_mpasi_comment.mpasi_id",$id);
        $this->db->where("parent_comment_id", 0);

        return $this->db->get()->result_array();
    }

    public function get_reciperating_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_mpasi_rating');
        $this->db->join('m_customer', 'm_mpasi_rating.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where("mpasi_id",$id);

        return $this->db->get()->result_array();
    }

    public function get_recipe_trycook_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_mpasi_trycook');
        $this->db->where("mpasi_id",$id);

        return $this->db->get()->result_array();
    }

    public function m_recipe_join_tag($id)
    {
        $this->db->select('m_tags.tag_name');
        $this->db->from('m_mpasi_tags');
        $this->db->join('m_mpasi', 'm_mpasi_tags.mpasi_id = m_mpasi.mpasi_id', 'INNER');
        $this->db->join('m_tags', 'm_mpasi_tags.tag_id = m_tags.tag_id', 'INNER');
        $this->db->where('m_mpasi.mpasi_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_customer_detail($customer_id)
    {
        $this->db->select('*');
        $this->db->from('m_customer_detail');
        $this->db->where("is_loggedin",1);
        $this->db->where("customer_id",$customer_id);

        return $this->db->get()->result_array();
    }

    public function m_mpasi_join_approval()
    {
        $where = 'recipe_status_id = 1 OR recipe_status_id = 3 OR recipe_status_id = 5';

        $this->db->select('*');
        $this->db->from('m_mpasi');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_recipe_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe_status');
        $this->db->where("recipe_status_id",$id);

        return $this->db->get()->row();
    }

    public function get_count_mpasi_view($id)
    {
       $this->db->where('mpasi_id', $id);
       return $this->db->count_all_results('m_mpasi_views');
    }

    public function get_count_mpasi_like($id)
    {
       $this->db->where('mpasi_id', $id);
       $this->db->where('action_type', 'LIKE');
       return $this->db->count_all_results('m_mpasi_action');
    }
    
    public function count_mpasi()
    {
        $this->db->select('*');
        $this->db->from('m_mpasi');
        $this->db->where('recipe_status_id',2);
        $this->db->where('is_active',1);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_mpasi_trycook()
    {
        $this->db->select('*');
        $this->db->from('m_mpasi_trycook');
        $this->db->where('is_active',1);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_mpasi_try_monthly($month)
    {

        $query = $this->db->query("SELECT * FROM m_mpasi_trycook WHERE is_active = 1 AND MONTH(created_date) = $month");
        return $query->num_rows();
    }

    public function count_mpasi_monthly($month)
    {

        $query = $this->db->query("SELECT * FROM m_mpasi WHERE is_active = 1 AND MONTH(created_date) = $month");
        return $query->num_rows();
    }

    public function graph_category()
    {
        
        $query = $this->db->query("SELECT m_category_mpasi.category_name, COUNT(*) maximum FROM m_mpasi INNER JOIN m_category_mpasi ON m_mpasi.category_mpasi_id = m_category_mpasi.category_mpasi_id WHERE m_mpasi.is_active = 1 GROUP BY category_name ORDER BY maximum DESC")->result_array();
        return $query;
    }
    
    public function truncate_mpasi_graph_ing()
    {
        $this->db->from('grafik_ingredients_mpasi');
        $this->db->truncate();

    }

    public function popular_mpasi()
    {
        $query = $this->db->query
            ("
                SELECT a.mpasi_id, a.title, e.fullname, a.cover_image, a.customer_id,

                (SELECT COUNT(b.mpasi_id) FROM m_mpasi_views b WHERE b.mpasi_id = a.mpasi_id) AS view,
                (SELECT COUNT(c.mpasi_id) FROM m_mpasi_comment c WHERE c.mpasi_id = a.mpasi_id) AS comment,
                (SELECT COUNT(d.mpasi_id) FROM m_mpasi_action d WHERE d.mpasi_id = a.mpasi_id) AS likes

                FROM m_mpasi a
                INNER JOIN m_customer e ON a.customer_id = e.customer_id
                ORDER BY view DESC, comment DESC, likes DESC
                LIMIT 10
            ")->result_array();
            return $query;
    }

    public function get_notification_mpasi()
    {
        $query = $this->db->query("SELECT a.notification_id, a.type, a.target_id, a.created_date, b.title, c.fullname AS fullname, d.fullname AS follower FROM m_notification a INNER JOIN m_mpasi b ON a.target_id = b.mpasi_id INNER JOIN m_customer c ON a.receiver_customer_id = c.customer_id INNER JOIN m_customer d ON a.sender_customer_id = d.customer_id ORDER BY a.notification_id DESC LIMIT 10")->result_array();
        return $query;
    }

    

    

}