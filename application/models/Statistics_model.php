<?php
    class Statistics_model extends CI_Model{
        function total_no_of_proverbs(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_proverb')
                            ->get();
            return $query->result();
        }// eof total_no_of_proverbs()

        function total_no_of_users(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_user')
                            ->get();
            return $query->result();
        }// eof total_no_of_proverbs()

        function total_no_of_languages(){
            // $this->load->database();
            $query = $this->db
                            ->from('table_lang')
                            ->get();
            return $query->result();
        }// eof total_no_of_languages()

    }