<?php
    class Admin_model extends CI_Model{
        // Get all feedbacks added by users
        public function feedback_list($limit, $offset){
            $query = $this->db
                                ->select(['feedback_id','feedback_title', 'feedback_body', 'feedback_type', 'feedback_by', 'table_user.user_name', 'feedback_context', 'feedback_timestamp'])
                                ->from('table_feedback')
                                ->order_by('feedback_timestamp', 'DESC')
                                ->join('table_user', 'table_feedback.feedback_by = table_user.user_id') 
                                ->limit($limit, $offset)
                                ->get();
            return $query->result(); 
        } // eof proverb_list()

        // Returning total number of Feedbacks for Pagination
        public function num_rows_feedback(){
            $query = $this->db
                                ->select(['feedback_id'])
                                ->from('table_feedback')
                                ->get();
            return $query->num_rows(); 
        } // eof num_rows_feedback()

        // Get all Users
        public function users_list($limit, $offset){
            $query = $this->db
                                ->select(['user_id','user_fullname', 'user_email', 'user_name', 'table_lang.lang_name', 'user_nativelang', 'user_otherlang', 'user_country', 'user_address', 'user_department', 'user_bio', 'user_timestamp'])
                                ->from('table_user')
                                ->order_by('user_timestamp', 'DESC')
                                ->join('table_lang', 'table_user.user_nativelang = table_lang.lang_id') 
                                ->limit($limit, $offset)
                                ->get();
            return $query->result();
        } // eof proverb_list()

        // Returning total number of Feedbacks for Pagination
        public function num_rows_users(){
            $query = $this->db
                            ->select(['user_id'])
                            ->from('table_user')
                            ->get();
            return $query->num_rows();
        } // eof num_rows_feedback()

        // Ban User from not editing or adding Proverb
        public function temp_ban_user($user_name, $post){
            return $this->db
                            ->set('user_can_contribute', $post) 
                            ->where('user_name', $user_name)
                            ->update('table_user');
        } // eof temp_ban_user()

        // Ban User from not editing or adding Proverb
        public function delete_proverb($proverb_id){
            return $this->db
                            ->where('proverb_id', $proverb_id)
                            ->delete('table_proverb');
        } // eof delete_proverb()        

    } // eof Class Admin_model