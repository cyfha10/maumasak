<?php

class Master_model extends CI_Model
{
  
    public function data_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    
    public function m_admin()
    {
        $this->db->select('*');
        $this->db->from('m_admin');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_admin($data)
    {
        $this->db->insert('m_admin',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function get_admin($id)
    {
        $this->db->select('*');
        $this->db->from('m_admin');
        $this->db->where("admin_id",$id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    function update($data,$id)
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

    function hapus($id)
    {
        $this->db->where('admin_id',$id);
        $this->db->delete('m_admin');
        return $this->db->affected_rows();
    }   


    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
    }

    public function m_role()
    {
        $this->db->select('*');
        $this->db->from('m_role');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_role($data)
    {
        $this->db->insert('m_role',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function get_role($id)
    {
        $this->db->select('*');
        $this->db->from('m_role');
        $this->db->where("role_id",$id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    function updaterole($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('role_id',$id); 
        $this->db->update('m_role',$data);

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

    function hapusrole($id)
    {
        $this->db->where('role_id',$id);
        $this->db->delete('m_role');
        return $this->db->affected_rows();
    }

    public function m_tags()
    {
        $this->db->select('*');
        $this->db->from('m_tags');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function m_tags_sort()
    {
        $this->db->select('*');
        $this->db->from('m_tags');
        $this->db->order_by('tag_name', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_tags($data)
    {
        $this->db->insert('m_tags',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function get_tags($id)
    {
        $this->db->select('*');
        $this->db->from('m_tags');
        $this->db->where("tag_id",$id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    public function get_name_tags($name)
    {
        $this->db->select('*');
        $this->db->from('m_tags');
        $this->db->where("tag_name",$name);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    function updatetags($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('tag_id',$id); 
        $this->db->update('m_tags',$data);

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

    function hapustags($id)
    {
        $this->db->where('tag_id',$id);
        $this->db->delete('m_tags');
        return $this->db->affected_rows();
    }

    public function m_recipe_status()
    {
        $this->db->select('*');
        $this->db->from('m_recipe_status');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_recipestatus($data)
    {
        $this->db->insert('m_recipe_status',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function get_recipestatus($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe_status');
        $this->db->where("recipe_status_id",$id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    function updaterecipestatus($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('recipe_status_id',$id); 
        $this->db->update('m_recipe_status',$data);

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

    function hapusrecipestatus($id)
    {
        $this->db->where('recipe_status_id',$id);
        $this->db->delete('m_recipe_status');
        return $this->db->affected_rows();
    }

    public function m_cuisine()
    {
        $this->db->select('*');
        $this->db->from('m_cuisine');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_cuisine($data)
    {
        $this->db->insert('m_cuisine',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function get_cuisine($id)
    {
        $this->db->select('*');
        $this->db->from('m_cuisine');
        $this->db->where("cuisine_id",$id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    function updatecuisine($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('cuisine_id',$id); 
        $this->db->update('m_cuisine',$data);

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

    function hapuscuisine($id)
    {
        $this->db->where('cuisine_id',$id);
        $this->db->delete('m_cuisine');
        return $this->db->affected_rows();
    }

    public function m_recipe()
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        // $this->db->where('recipe_status_id', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapusresep($id)
    {
        $this->db->where('recipe_id',$id);
        $this->db->delete('m_recipe');
        return $this->db->affected_rows();
    }  

    public function m_recipe_join()
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->join('m_customer', 'm_recipe.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where('m_recipe.recipe_status_id', 2);
        $this->db->where('m_recipe.is_active', 1);        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_recipe_join_filter($filter)
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->join('m_customer', 'm_recipe.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where('m_recipe.recipe_status_id', $filter);
        $this->db->where('m_recipe.is_active', 1);        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_recipe_all()
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->join('m_customer', 'm_recipe.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where('m_recipe.is_active', 1);        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function m_recipe_join_tag($id)
    {
        $this->db->select('m_tags.tag_name');
        $this->db->from('m_recipe_tags');
        $this->db->join('m_recipe', 'm_recipe_tags.recipe_id = m_recipe.recipe_id', 'INNER');
        $this->db->join('m_tags', 'm_recipe_tags.tag_id = m_tags.tag_id', 'INNER');
        $this->db->where('m_recipe.recipe_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_recipe_join_approval()
    {
        $where = 'recipe_status_id = 1 OR recipe_status_id = 3 OR recipe_status_id = 5';

        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_recipe_choose()
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->join('m_customer', 'm_recipe.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where('m_recipe.recipe_status_id = 2');
       	$this->db->where('m_recipe.is_active', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_recipes_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->join('m_customer', 'm_recipe.customer_id = m_customer.customer_id', 'INNER');
        $this->db->join('m_recipe_status', 'm_recipe.recipe_status_id = m_recipe_status.recipe_status_id', 'INNER');
        $this->db->join('m_cuisine', 'm_recipe.cuisine_id = m_cuisine.cuisine_id', 'INNER');
        $this->db->where("m_recipe.recipe_id",$id);

        return $this->db->get()->row();
    }

    public function get_recipekomen_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe_comment');
        $this->db->join('m_customer', 'm_recipe_comment.customer_id = m_customer.customer_id', 'INNER');
        $this->db->join('m_recipe', 'm_recipe_comment.recipe_id = m_recipe.recipe_id', 'INNER');
        $this->db->where("m_recipe_comment.recipe_id",$id);
        $this->db->where("parent_comment_id", 0);

        return $this->db->get()->result_array();
    }

    public function get_reciperating_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe_rating');
        $this->db->join('m_customer', 'm_recipe_rating.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where("recipe_id",$id);

        return $this->db->get()->result_array();
    }

    public function get_recipe_trycook_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_trycook');
        $this->db->where("recipe_id",$id);

        return $this->db->get()->result_array();
    }


    public function get_customer_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where("customer_id",$id);

        return $this->db->get()->row();
    }

    public function get_customer_detail()
    {
        $this->db->select('*');
        $this->db->from('m_customer_detail');
        $this->db->where("is_loggedin",1);

        return $this->db->get()->result_array();
    }

    public function get_recipe_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe_status');
        $this->db->where("recipe_status_id",$id);

        return $this->db->get()->row();
    }

    public function get_recipes($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->where("recipe_id",$id);

        return $this->db->get()->row();
    }

    public function getrecipe_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->where("recipe_id",$id);

        return $this->db->get()->row();
    }

    public function get_count_recipetags($id)
    {
       $this->db->where('recipe_id', $id);
       return $this->db->count_all_results('m_recipe_tags');
    }

    function delete_recipetags_by_recipe_id($id)
    {
        $this->db->where('recipe_id',$id);
        $this->db->delete('m_recipe_tags');
        return $this->db->affected_rows();
    } 

    public function getrecipe_orderby()
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->order_by('recipe_id', 'DESC');

        return $this->db->get()->row();
    }

    public function insert_recipe($data)
    {
        $this->db->insert('m_recipe',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function insert_notification_approval($data)
    {
        $this->db->insert('m_notification',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    function update_recipe($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('recipe_id',$id); 
        $this->db->update('m_recipe',$data);

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

    public function insert_recipe_tags($data)
    {
        $this->db->insert('m_recipe_tags',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function get_recipe($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->where("recipe_id",$id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    function updateapproval($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('recipe_id',$id); 
        $this->db->update('m_recipe',$data);

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

    function hapuskomen($id)
    {
        $this->db->where('recipe_comment_id',$id);
        $this->db->delete('m_recipe_comment');
        return $this->db->affected_rows();
    }

    function hapusrating($id)
    {
        $this->db->where('recipe_rating_id',$id);
        $this->db->delete('m_recipe_rating');
        return $this->db->affected_rows();
    }
    
    function hapus_trycook($id)
    {
        $this->db->where('trycook_id',$id);
        $this->db->delete('m_trycook');
        return $this->db->affected_rows();
    }

    function hapus_comment_trycook($id)
    {
        $this->db->where('trycook_id',$id);
        $this->db->delete('m_trycook_comment');
        return $this->db->affected_rows();
    }

    function hapus_trycook_comment($id)
    {
        $this->db->where('trycook_comment_id',$id);
        $this->db->delete('m_trycook_comment');
        return $this->db->affected_rows();
    }


    public function get_resepcuisine($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->join('m_cuisine', );
        $this->db->where("cuisine_id",$id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    public function m_customer()
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->join('m_customer_detail', 'm_customer.customer_id = m_customer_detail.customer_id', 'INNER');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_customer_recipe()
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_customer_real()
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where("customer_type", 'REAL');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_customer_anonim()
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where("customer_type", 'ANONIM');
        $this->db->order_by("customer_id", 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcustomer_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where("customer_id", $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcustomer_detail($id)
    {
        $this->db->select('*');
        $this->db->from('m_customer_detail');
        $this->db->where("customer_id", $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function insert_customer($data)
    {
        $this->db->insert('m_customer',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    function update_customer($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('customer_id',$id); 
        $this->db->update('m_customer',$data);

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
    
    public function getfollower($id)
    {
         $this->db->where('follow_customer_id', $id);
        return $this->db->count_all_results('m_customer_relation');
    }

    public function getfollowing($id)
    {
         $this->db->where('customer_id', $id);
        return $this->db->count_all_results('m_customer_relation');
    }

    public function getrceipe_count_by_customer($id)
    {
         $this->db->where('customer_id', $id);
        return $this->db->count_all_results('m_recipe');
    }

    public function getrecipe_by_customer_id($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->where("customer_id", $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gettrycook_by_customer_id($id)
    {
        $this->db->select('*');
        $this->db->from('m_trycook');
        $this->db->where("customer_id", $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function block_customer($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('customer_id',$id); 
        $this->db->update('m_customer',$data);

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

    public function count_resep()
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->where('recipe_status_id',2);
        $this->db->where('is_active',1);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_active_customer()
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where('customer_type', 'REAL');
        $this->db->where('is_active', 1);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_customer()
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where('customer_type', 'REAL');

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_tag()
    {
        $this->db->select('*');
        $this->db->from('m_tags');

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_trycook()
    {
        $this->db->select('*');
        $this->db->from('m_trycook');

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_resep_approval()
    {
        $where = 'recipe_status_id = 1 OR recipe_status_id = 3 OR recipe_status_id = 5';

        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function m_category()
    {
        $this->db->select('*');
        $this->db->from('m_category');
        // $this->db->where('recipe_status_id', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_category($id)
    {
        $this->db->select('*');
        $this->db->from('m_category');
        $this->db->where("category_id",$id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    function update_category($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('category_id',$id); 
        $this->db->update('m_category',$data);

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

    public function m_set_menu()
    {
        $this->db->select('*');
        $this->db->from('m_set_menu');
        // $this->db->where('recipe_status_id', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_category($data)
    {
        $this->db->insert('m_category',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function insert_setmenu($data)
    {
        $this->db->insert('m_set_menu',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function get_setmenu($id)
    {
        $this->db->select('*');
        $this->db->from('m_set_menu');
        $this->db->where("set_menu_id", $id);
        
        return $this->db->get()->row();
    }

    public function get_setmenu_orderby()
    {
        $this->db->select('*');
        $this->db->from('m_set_menu');
        $this->db->order_by('set_menu_id', 'DESC');

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    function updatesetmenu($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('set_menu_id',$id); 
        $this->db->update('m_set_menu',$data);

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

    public function m_article()
    {
        $this->db->select('*');
        $this->db->from('m_article');
        $this->db->order_by('article_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_article($data)
    {
        $this->db->insert('m_article',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function get_article($id)
    {
        $this->db->select('*');
        $this->db->from('m_article');
        $this->db->join('m_customer', 'm_article.customer_id = m_customer.customer_id', 'JOIN');
        $this->db->where("m_article.article_id", $id);
        
        return $this->db->get()->row();
    }

    public function get_article_orderby()
    {
        $this->db->select('*');
        $this->db->from('m_article');
        $this->db->order_by('article_id', 'DESC');

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    function updatearticle($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('article_id',$id); 
        $this->db->update('m_article',$data);

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

    public function choosecustomer()
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where("is_verified", 1);
        $this->db->where("is_active", 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function customer_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where("customer_id", $id);
        
        return $this->db->get()->row();
    }

    public function insert_rekomen($data)
    {
        $this->db->insert('m_recipe_recommendation',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function m_recipe_recommendation()
    {
        $this->db->select('*');
        $this->db->from('m_recipe_recommendation');
        $this->db->join('m_recipe', 'm_recipe.recipe_id = m_recipe_recommendation.recipe_id', 'JOIN');
        // $this->db->where('recipe_status_id', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function recipe_rekomen_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe_recommendation');
        $this->db->where("recipe_recommendation_id", $id);
        
        return $this->db->get()->row();
    }

    function update_rekomen($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('recipe_recommendation_id',$id); 
        $this->db->update('m_recipe_recommendation',$data);

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

    function deleterekomen($id)
    {
        $this->db->where('recipe_recommendation_id',$id);
        $this->db->delete('m_recipe_recommendation');
        return $this->db->affected_rows();
    }

    public function m_banner()
    {
        $this->db->select('*');
        $this->db->from('m_banner');
        
        return $this->db->get()->result_array();
    }

    public function get_banner_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_banner');
        $this->db->where('banner_id', $id);

        return $this->db->get()->row();
    }

    public function getbanner_orderby()
    {
        $this->db->select('*');
        $this->db->from('m_banner');
        $this->db->order_by('banner_id', 'DESC');

        return $this->db->get()->row();
    }

    public function insert_banner($data)
    {
        $this->db->insert('m_banner',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    function updatebanner($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('banner_id',$id); 
        $this->db->update('m_banner',$data);

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

    function deletebanner($id)
    {
        $this->db->where('banner_id',$id);
        $this->db->delete('m_banner');
        return $this->db->affected_rows();
    }
    
    function updaterecipe($data,$id)
    {

        $this->db->trans_begin();

        $this->db->where('recipe_id',$id); 
        $this->db->update('m_recipe',$data);

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
    
    public function count_users_month($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah FROM m_customer WHERE customer_type = 'REAL' AND MONTH(register_date) = $id AND register_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    function update_grafik_user($data,$grafik_user_id)
    {

        $this->db->trans_begin();

        $this->db->where('grafik_user_id',$grafik_user_id); 
        $this->db->update('grafik_user',$data);

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
    
    public function grafik_user()
    {
        $this->db->select('*');
        $this->db->from('grafik_user');

        return $this->db->get()->result_array();
    }

    public function insert_ingredients($data)
    {
        $this->db->insert('grafik_ingredients',$data); 

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0;
        }
        else
        {
                $this->db->trans_commit();
                return 1;
        }
    
    }

    public function truncate_graph_ing()
    {
        $this->db->from('grafik_ingredients');
        $this->db->truncate();

    }

    public function graph_ingredients()
    {
        $this->db->select('*');
        $this->db->from('grafik_ingredients');

        return $this->db->get()->result_array();
    }

    
    public function graph()
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';

        $query = $this->db->query("SELECT MONTH(register_date) AS month, COUNT(customer_id) AS total_register
         FROM m_customer WHERE customer_type = 'REAL' AND register_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
         GROUP BY MONTH(register_date)")->result_array();
        return $query;
    }

    public function graph_cuisine()
    {
        
        $query = $this->db->query("SELECT m_cuisine.cuisine_name, COUNT(*) maximum FROM m_recipe INNER JOIN m_cuisine ON m_recipe.cuisine_id = m_cuisine.cuisine_id WHERE m_recipe.is_active = 1 GROUP BY cuisine_name ORDER BY maximum DESC")->result_array();
        return $query;
    }

    public function graph_device()
    {
        $query = $this->db->query("SELECT device_brand, CASE WHEN device_brand = 'Apple' THEN 'IOS' WHEN device_brand != 'Apple' THEN 'Android' Else 'Android' END AS device, COUNT(device_brand) AS jum_device from m_customer_detail GROUP BY device")->result_array();
        return $query;


    }
    
    public function popular_recipe()
    {
        $query = $this->db->query
            ("
	        SELECT a.recipe_id, a.title, e.fullname, a.cover_image, a.customer_id,

                (SELECT COUNT(b.recipe_id) FROM m_recipe_views b WHERE b.recipe_id = a.recipe_id) AS view,
                (SELECT COUNT(c.recipe_id) FROM m_recipe_comment c WHERE c.recipe_id = a.recipe_id) AS comment,
                (SELECT COUNT(d.recipe_id) FROM m_recipe_action d WHERE d.recipe_id = a.recipe_id) AS likes

                FROM m_recipe a
                INNER JOIN m_customer e ON a.customer_id = e.customer_id
                ORDER BY view DESC, comment DESC, likes DESC
                LIMIT 10
            ")->result_array();
            return $query;
    }
    
    public function popular_ingredients()
    {
        $this->db->select('*');
        $this->db->from('m_recipe');

        return $this->db->get()->result_array();
    }
    
    public function get_notification()
    {
        $query = $this->db->query("SELECT a.notification_id, a.type, a.target_id, a.created_date, b.title, c.fullname AS fullname, d.fullname AS follower FROM m_notification a INNER JOIN m_recipe b ON a.target_id = b.recipe_id INNER JOIN m_customer c ON a.receiver_customer_id = c.customer_id INNER JOIN m_customer d ON a.sender_customer_id = d.customer_id ORDER BY a.notification_id DESC LIMIT 10")->result_array();
        return $query;

        return $this->db->get()->result_array();
    }
    
    public function get_count_recipeview($id)
    {
       $this->db->where('recipe_id', $id);
       return $this->db->count_all_results('m_recipe_views');
    }

    public function get_count_recipelike($id)
    {
       $this->db->where('recipe_id', $id);
       $this->db->where('action_type', 'LIKE');
       return $this->db->count_all_results('m_recipe_action');
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

    public function count_recipe_try_monthly($month)
    {

        $query = $this->db->query("SELECT * FROM m_trycook WHERE is_active = 1 AND MONTH(created_date) = $month");
        return $query->num_rows();
    }

    public function count_recipe_monthly($month)
    {

        $query = $this->db->query("SELECT * FROM m_recipe WHERE is_active = 1 AND MONTH(created_date) = $month");
        return $query->num_rows();
    }




}