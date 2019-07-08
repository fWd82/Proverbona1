<?php
    class Statistics_model extends CI_Model{
        // Total number of Proverbs
        function total_no_of_proverbs(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_proverb')
                            ->get();
            return $query->result();
        }// eof total_no_of_proverbs()

        function total_no_of_eng_proverbs(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_proverb')
                            ->where(['proverb_lang'=>1])
                            ->get();
            return $query->result();
        }// eof total_no_of_eng_proverbs()

        function total_no_of_ur_proverbs(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_proverb')
                            ->where(['proverb_lang'=>3])
                            ->get();
            return $query->result();
        }// eof total_no_of_ur_proverbs()

        function total_no_of_ps_proverbs(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_proverb')
                            ->where(['proverb_lang'=>2])
                            ->get();
            return $query->result();
        }// eof total_no_of_ps_proverbs()

        // Total number of Users
        function total_no_of_users(){ 
            $query = $this->db
                            ->from('table_user')
                            ->get();
            return $query->result();
        }// eof total_no_of_proverbs()

        // Total number of Languages
        function total_no_of_languages(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_lang')
                            ->get();
            return $query->result();
        }// eof total_no_of_languages()

        function total_no_of_reference_items(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_reference')
                            ->get();
            return $query->result();
        }// eof total_no_of_reference_items()

        function total_no_of_user_added_proverbs(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_proverb')
                            ->where(['proverb_addedby'>2])
                            ->get();
            return $query->result();
        }// eof total_no_of_ps_proverbs()

        // Total number of Proverbs
        function total_no_of_proverbs_stars(){
            // $this->load->database();
            $query = $this->db
                            ->select()
                            ->from('table_rating_proverb')
                            ->get();
            return $query->result();
        }// eof total_no_of_proverbs()

        // Total number of Proverbs
        function total_no_of_proverbs_added_by_user($user_name){
            // $this->load->database();
            $query = $this->db
                            ->from('table_proverb')
                            ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                            ->where('user_name', $user_name)
                            ->get();
            return $query->num_rows();
        }// eof total_no_of_proverbs()    

    } // eof Class Statistics_model 