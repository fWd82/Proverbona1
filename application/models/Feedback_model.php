<?php
    class Feedback_model extends CI_Model{
        public function insert_feedback($array){ 
            $this->load->database();
            return $this->db->insert('table_feedback', $array);
        }
    } 