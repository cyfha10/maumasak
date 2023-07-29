<?php

class General_model extends CI_Model
{
  
    public function data_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_where_one($table, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    public function get_one($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_one_many($table, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_orderby_one($table, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, 'DESC');

        return $this->db->get()->row();
    }

    public function get_count_mpasitags($id)
    {
       $this->db->where('mpasi_id', $id);
       return $this->db->count_all_results('m_mpasi_tags');
    }

    public function get_one_many_orderby($table, $where, $id, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);
        $this->db->order_by($order_by, 'DESC');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table,$data); 

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

    function update($table,$data,$where,$id)
    {

        $this->db->trans_begin();

        $this->db->where($where,$id); 
        $this->db->update($table,$data);

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

    function delete($table, $where, $id)
    {
        $this->db->where($where,$id);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    public function get_join($table,$table2, $join_id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_where($table,$table2, $join_id, $where, $where_id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->where($where, $where_id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_wheres($table,$table2, $join_id, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_logs($order_id)
    {
        $query = $this->db->query("SELECT * FROM tx_order_log INNER JOIN m_order_status ON tx_order_log.order_status_id = m_order_status.order_status_id WHERE tx_order_log.order_id = '$order_id'")->result_array();
        return $query;
    }

    public function get_join_dua($table,$table2, $table3, $join_id, $join_id2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_dua_where($table,$table2, $table3, $join_id, $join_id2, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_tiga($table,$table2, $table3, $table4, $join_id, $join_id2, $join_id3)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');
        $this->db->join($table4, $join_id3, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }
    
    public function get_join_empat($table,$table2, $table3, $table4, $table5, $join_id, $join_id2, $join_id3, $join_id4)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');
        $this->db->join($table4, $join_id3, 'JOIN');
        $this->db->join($table5, $join_id4, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_sellers($seller_id)
    {
        $this->db->select('*');
        $this->db->from('m_customer_detail');
        $this->db->where("is_loggedin",1);
        $this->db->where("customer_id",$seller_id);

        return $this->db->get()->result_array();
    }

    public function get_buyers($buyer_id)
    {
        $this->db->select('*');
        $this->db->from('m_customer_detail');
        $this->db->where("is_loggedin",1);
        $this->db->where("customer_id",$buyer_id);

        return $this->db->get()->result_array();
    }

    public function count($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_where($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function paymment_confirm()
    {
        $query = $this->db->query(
            "
            SELECT a.created_date, a.invoice_no, a.total_amount, a.grand_total_amount, a.recipe_type, a.order_id, c.customer_id AS buyer_id, c.fullname AS buyer_name,d.customer_id AS seller_id, d.fullname AS seller_name 
            FROM tx_order_parent a 
            INNER JOIN tx_order_payment b ON a.order_id = b.order_id 
            INNER JOIN m_customer c ON a.customer_id = c.customer_id 
            INNER JOIN m_customer d ON a.customer_id = d.customer_id 
            WHERE a.order_status_id = 'ST001' 
            AND b.is_paid = 0

            "
        )->result_array();
        return $query;
    }

    public function paymment_confirms()
    {
        $query = $this->db->query("
            SELECT count(*) as jumlah, a.created_date, a.invoice_no, b.qty, b.price, b.total_amount, b.total_amount, a.order_id, d.title, e.customer_id AS buyer_id, e.fullname AS buyer_name,f.customer_id AS seller_id, f.fullname AS seller_name 
            FROM tx_order_parent a 
            INNER JOIN tx_order_detail b ON a.order_id = b.order_id
            INNER JOIN tx_order_payment c ON a.order_id = c.order_id 
            INNER JOIN m_recipe d ON b.recipe_id = d.recipe_id 
            INNER JOIN m_customer e ON b.customer_id = e.customer_id  
            INNER JOIN m_customer f ON b.customer_id = f.customer_id 
            WHERE a.order_status_id = 'ST001' 
            AND c.is_paid = 0
            ")->result_array();
        return $query;
    }

    public function get_seller($order_id)
    {
        $query = $this->db->query("
            SELECT a.created_date, a.invoice_no, b.qty, b.price, a.total_amount, a.grand_total_amount, a.order_id, d.title, e.customer_id AS seller_id, e.fullname AS seller_name,f.customer_id AS buyer_id, f.fullname AS buyer_name 
            FROM tx_order_parent a 
            INNER JOIN tx_order_detail b ON a.order_id = b.order_id 
            INNER JOIN tx_order_payment c ON a.order_id = c.order_id 
            INNER JOIN m_recipe d ON b.recipe_id = d.recipe_id 
            INNER JOIN m_customer e ON a.customer_id = e.customer_id 
            INNER JOIN m_customer f ON a.customer_id = f.customer_id
            WHERE a.order_id = '$order_id'
            ")->row();
        return $query;
    }

    public function paymentdetail($order_id)
    {
        $query = $this->db->query("SELECT * FROM tx_order_parent a INNER JOIN tx_order_payment b ON a.order_id = b.order_id INNER JOIN tx_confirm_payment c ON a.order_id = c.order_id WHERE a.order_id = '$order_id'")->result_array();
        return $query;
    }
    
    public function get_new_orders()
    {
        $query = $this->db->query("
            SELECT a.created_date, a.order_id,a.invoice_no, a.distance, a.order_address,a.order_latitude, a.order_longitude, a.courier_name, a.courier_service, a.shipping_amount, a.receiver_name, a.grand_total_amount, c.payment_method_name, c.account_name, c.account_number, c.branch, e.customer_id AS buyer_id, e.fullname AS buyer_name,f.customer_id AS seller_id, f.fullname AS seller_name 
            FROM tx_order_parent a
            INNER JOIN m_order_status b ON a.order_status_id = b.order_status_id 
            INNER JOIN m_payment_method c ON a.payment_method_id = c.payment_method_id 
            INNER JOIN m_payment_method_type d ON c.payment_method_type_id = d.payment_method_type_id 
            INNER JOIN m_customer e ON a.customer_id = e.customer_id 
            INNER JOIN m_customer f ON a.customer_id = f.customer_id
            WHERE a.order_status_id = 'ST001' 
            OR a.order_status_id = 'ST002' 
            OR a.order_status_id = 'ST003'
            ")->result_array();
        return $query;
    }

    public function get_processed_orders()
    {
        $query = $this->db->query("
            SELECT * FROM tx_order_parent a
            INNER JOIN tx_order_detail b ON a.order_id = b.order_id
            INNER JOIN m_recipe c ON b.recipe_id = c.recipe_id 
            INNER JOIN m_order_status d ON a.order_status_id = d.order_status_id 
            INNER JOIN m_payment_method e ON a.payment_method_id = e.payment_method_id 
            INNER JOIN m_payment_method_type f ON e.payment_method_type_id = f.payment_method_type_id 
            WHERE a.order_status_id = 'ST004' 
            OR a.order_status_id = 'ST005'
            ")->result_array();
        return $query;
    }

    public function get_order_history()
    {
        $query = $this->db->query("
            SELECT * FROM tx_order_parent a
            INNER JOIN tx_order_detail b ON a.order_id = b.order_id
            INNER JOIN m_recipe c ON b.recipe_id = c.recipe_id 
            INNER JOIN m_order_status d ON a.order_status_id = d.order_status_id 
            INNER JOIN m_payment_method e ON a.payment_method_id = e.payment_method_id 
            INNER JOIN m_payment_method_type f ON e.payment_method_type_id = f.payment_method_type_id 
            WHERE a.order_status_id = 'ST006' 
            OR a.order_status_id = 'ST007'
            ")->result_array();
        return $query;
    }

    public function get_sum_wallet($customer_id)
    {
        $query = $this->db->query("SELECT SUM(nominal) as wallet FROM tx_wallet WHERE customer_id = $customer_id")->row();
        return $query;
    }

    public function get_sum_withdraw($customer_id)
    {
        $query = $this->db->query("SELECT SUM(total_nominal) as withdraw FROM tx_withdraw WHERE customer_id = $customer_id")->row();
        return $query;
    }

    public function popular_recipe_sale()
    {
        $query = $this->db->query
            ("
                    SELECT a.recipe_id, a.title, e.fullname, a.cover_image, a.customer_id,

                    (SELECT COUNT(c.recipe_id) FROM tx_order_parent b INNER JOIN tx_order_detail c ON b.order_id = c.order_id WHERE b.recipe_type = 'mpasi' AND c.recipe_id = a.recipe_id and b.order_status_id != 'ST007') AS sale,
                    (SELECT COUNT(c.recipe_id) FROM tx_order_parent b INNER JOIN tx_order_detail c ON b.order_id = c.order_id WHERE b.recipe_type = 'mpasi' AND c.recipe_id = a.recipe_id and b.order_status_id = 'ST006') AS finish,
                    (SELECT COUNT(c.recipe_id) FROM tx_order_parent b INNER JOIN tx_order_detail c ON b.order_id = c.order_id INNER JOIN tx_order_rating d ON b.order_id = d.order_id WHERE b.recipe_type = 'mpasi' AND c.recipe_id = a.recipe_id) AS ulasan

                   
                    FROM m_recipe a
                    INNER JOIN m_customer e ON a.customer_id = e.customer_id
                    ORDER BY sale DESC, finish DESC, ulasan DESC
                    LIMIT 10
            ")->result_array();
            return $query;
    }

    public function count_orders_month($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order FROM tx_order_parent WHERE recipe_type = 'recipe' AND order_status_id != 'ST007' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }


    public function count_orders_month_finish($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_finish FROM tx_order_parent WHERE recipe_type = 'recipe' AND order_status_id = 'ST006' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    public function count_orders_month_cancel($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_cancel FROM tx_order_parent WHERE recipe_type = 'recipe' AND order_status_id = 'ST007' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    public function count_orders_month_delivery($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_delivery FROM tx_order_parent WHERE recipe_type = 'recipe' AND order_status_id = 'ST005' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    public function count_orders_month_process($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_process FROM tx_order_parent WHERE recipe_type = 'recipe' AND order_status_id = 'ST004' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    public function count_orders_month_new($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_new FROM tx_order_parent WHERE recipe_type = 'recipe' AND order_status_id = 'ST003' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    public function count_avg()
    {
        $query = $this->db->query("SELECT AVG(tx_order_rating.rating) AS average FROM tx_order_rating INNER JOIN tx_order_parent ON tx_order_rating.order_id = tx_order_parent.order_id WHERE recipe_type = 'recipe'")->row();
        return $query;
    }

    public function count_avg_mpasi()
    {
        $query = $this->db->query("SELECT AVG(tx_order_rating.rating) AS average FROM tx_order_rating INNER JOIN tx_order_parent ON tx_order_rating.order_id = tx_order_parent.order_id WHERE recipe_type = 'mpasi'")->row();
        return $query;
    }

    public function count_sum($sum, $table)
    {
        $query = $this->db->query("SELECT SUM($sum) AS sum FROM $table")->row();
        return $query;
    }

    public function count_sum_where($sum, $table, $where)
    {
        $query = $this->db->query("SELECT SUM($sum) AS sum FROM $table WHERE $where")->row();
        return $query;
    }

    
    public function paymment_confirm_mpasi()
    {
        $query = $this->db->query(
            "
            SELECT a.created_date, a.invoice_no, a.total_amount, a.grand_total_amount, a.recipe_type, a.order_id, c.customer_id AS buyer_id, c.fullname AS buyer_name,d.customer_id AS seller_id, d.fullname AS seller_name 
            FROM tx_order_parent a 
            INNER JOIN tx_order_payment b ON a.order_id = b.order_id 
            INNER JOIN m_customer c ON a.customer_id = c.customer_id 
            INNER JOIN m_customer d ON a.customer_id = d.customer_id 
            WHERE a.recipe_type = 'mpasi' 
            AND a.order_status_id = 'ST001' 
            AND b.is_paid = 0
            "
        )->result_array();
        return $query;
    }	
    
    public function get_sum_poin($customer_id)
    {
        $query = $this->db->query("SELECT SUM(point) as poin FROM m_customer_point WHERE customer_id = $customer_id")->row();
        return $query;
    }
    
    public function count_orders_month_mpasi($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order FROM tx_order_parent WHERE recipe_type = 'mpasi' AND order_status_id != 'ST007' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }


    public function count_orders_month_finish_mpasi($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_finish FROM tx_order_parent WHERE recipe_type = 'mpasi' AND order_status_id = 'ST006' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    public function count_orders_month_cancel_mpasi($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_cancel FROM tx_order_parent WHERE recipe_type = 'mpasi' AND order_status_id = 'ST007' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    public function count_orders_month_delivery_mpasi($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_delivery FROM tx_order_parent WHERE recipe_type = 'mpasi' AND order_status_id = 'ST005' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    public function count_orders_month_process_mpasi($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_process FROM tx_order_parent WHERE recipe_type = 'mpasi' AND order_status_id = 'ST004' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }

    public function count_orders_month_new_mpasi($id)
    {
        $tahun = date('Y');
        $tanggal_awal = $tahun.'-'.'01'.'-'.'01';
        $tanggal_akhir = $tahun.'-'.'12'.'-'.'31';
        
        $query = $this->db->query("SELECT COUNT(*) AS jumlah_order_new FROM tx_order_parent WHERE recipe_type = 'mpasi' AND order_status_id = 'ST003' AND MONTH(created_date) = $id AND created_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->row();
        return $query;
    }
    
    public function get_notification_all()
    {
        $query = $this->db->query("
            SELECT a.notification_id, a.type, a.target_id, a.created_date, b.title, c.fullname AS fullname, d.fullname AS follower 
            FROM m_notification a 
            INNER JOIN m_recipe b ON a.target_id = b.recipe_id 
            INNER JOIN m_customer c ON a.receiver_customer_id = c.customer_id 
            INNER JOIN m_customer d ON a.sender_customer_id = d.customer_id 
                UNION ALL SELECT e.notification_id, e.type, e.target_id, e.created_date, f.title, g.fullname AS fullname, h.fullname AS follower 
                FROM m_notification e 
                INNER JOIN m_mpasi f ON e.target_id = f.mpasi_id 
                INNER JOIN m_customer g ON e.receiver_customer_id = g.customer_id 
                INNER JOIN m_customer h ON e.sender_customer_id = h.customer_id 
                ORDER BY notification_id DESC LIMIT 10")->result_array();
        return $query;
    }
    
    public function popular_mpasi_sale()
    {
        $query = $this->db->query
            ("
                SELECT a.mpasi_id, a.title, e.fullname, a.cover_image, a.customer_id, 
                    (SELECT COUNT(c.recipe_id) 
                        FROM tx_order_parent b 
                        INNER JOIN tx_order_detail c ON b.order_id = c.order_id 
                        WHERE b.recipe_type = 'mpasi' 
                        AND c.recipe_id = a.mpasi_id 
                        AND b.order_status_id != 'ST007') AS sale, 
                    (SELECT COUNT(c.recipe_id) 
                        FROM tx_order_parent b 
                        INNER JOIN tx_order_detail c ON b.order_id = c.order_id 
                        WHERE b.recipe_type = 'mpasi' 
                        AND c.recipe_id = a.mpasi_id 
                        AND b.order_status_id = 'ST006') AS finish, 
                    (SELECT COUNT(c.recipe_id) 
                        FROM tx_order_parent b 
                        INNER JOIN tx_order_detail c ON b.order_id = c.order_id 
                        INNER JOIN tx_order_rating d ON b.order_id = d.order_id 
                        WHERE b.recipe_type = 'mpasi' 
                        AND c.recipe_id = a.mpasi_id) AS ulasan 
                FROM m_mpasi a 
                INNER JOIN m_customer e ON a.customer_id = e.customer_id 
                ORDER BY sale DESC, finish DESC, ulasan DESC 
                LIMIT 10
            ")->result_array();
            return $query;
    }
    
    public function getmpasi_count_by_customer($id)
    {
         $this->db->where('customer_id', $id);
        return $this->db->count_all_results('m_mpasi');
    }

    public function gettrycook_by_customer_id($id)
    {
        $this->db->select('m_mpasi_trycook.mpasi_id, m_mpasi_trycook.customer_id, m_mpasi.title, m_mpasi_trycook.description, m_mpasi_trycook.trycook_image, m_mpasi_trycook.created_date');
        $this->db->from('m_mpasi_trycook');
        $this->db->join('m_mpasi', 'mpasi_id', 'join');
        $this->db->where("m_mpasi_trycook.customer_id", $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_log_recipe($order_id)
    {
        $query = $this->db->query
            ("
                SELECT a.order_id, b.title, a.recipe_type, a.price, a.qty, a.amount, a.discount_amount, a.total_amount
                FROM tx_order_detail a 
                INNER JOIN m_recipe b ON a.recipe_id  = b.recipe_id 
                WHERE a.order_id = '$order_id'
                    UNION ALL SELECT c.order_id, d.title, c.recipe_type, c.price, c.qty, c.amount, c.discount_amount, c.total_amount
                    FROM tx_order_detail c 
                    INNER JOIN m_mpasi d ON c.recipe_id = d.mpasi_id 
                    WHERE c.order_id = '$order_id' 
            ")->result_array();
            return $query;
    }

    


}