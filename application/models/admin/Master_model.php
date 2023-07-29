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
        // $this->db->where('recipe_status_id', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function m_recipe_choose()
    {
        $this->db->select('*');
        $this->db->from('m_recipe');
        $this->db->join('m_customer', 'm_recipe.customer_id = m_customer.customer_id', 'INNER');
        $this->db->where('m_recipe.recipe_status_id = 2');
        // $this->db->where('recipe_status_id', 2);
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

        return $this->db->get()->row();
    }

    public function get_recipe_trycook_comment_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_trycook');
        $this->db->where("recipe_id",$id);

        return $this->db->get()->row();
    }

    public function get_customer_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where("customer_id",$id);

        return $this->db->get()->row();
    }

    public function get_recipe_one($id)
    {
        $this->db->select('*');
        $this->db->from('m_recipe_status');
        $this->db->where("recipe_status_id",$id);

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

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_customer()
    {
        $this->db->select('*');
        $this->db->from('m_customer');

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

    public function m_article()
    {
        $this->db->select('*');
        $this->db->from('m_article');
        // $this->db->where('recipe_status_id', 2);
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

    function updaterekomen($id)
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




}