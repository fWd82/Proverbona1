<?php
    class Feedback_model extends CI_Model{
        
        // Insert Feeback value to database
        public function insert_feedback($array){ 
            $this->load->database();
            return $this->db->insert('table_feedback', $array);
        } // eof insert_feedback();
        
}