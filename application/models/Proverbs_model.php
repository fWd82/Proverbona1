<?php
    class Proverbs_model extends CI_Model{
        public function proverb_list(){

            // SELECT proverb_id, proverb_statement, proverb_tags, table_user.user_name, proverb_timestamp
            // FROM `table_proverb` 
            // INNER JOIN table_user ON 
            //      table_proverb.proverb_addedby = table_user.user_id;
            
            $this->load->database();
            $query = $this->db
                                ->select(['proverb_id','proverb_statement', 'proverb_tags', 'table_user.user_name', 'proverb_timestamp'])
                                ->from('table_proverb')
                                ->order_by('proverb_timestamp', 'DESC')
                                ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                                ->get();
            return $query->result();
        } // eof proverb_list()


        public function add_proverb($array){
            $this->load->database();
            return $this->db->insert('table_proverb', $array);
        } // eof add_proverb()
        
        public function get_reference() {
            $result = $this -> db -> select('reference_id, reference_category, reference_title, reference_author') -> get('table_reference') -> result_array(); 
            $proverb_reference = array(); 
            foreach($result as $r) { 
                $proverb_reference[$r['reference_id']] = $r['reference_category']  . ": " . $r['reference_title'] . " - " . $r['reference_author']; 
            } 
            $proverb_reference[''] = 'Select Reference...'; 
            // echo "<pre>";
            // print_r ($proverb_reference); exit;
            return $proverb_reference; 
        } // eof get_reference()

        public function get_proverb_id($id) {
            $q = $this->db->from('table_proverb')
                        ->where( ['proverb_id' => $id] )
                        ->get();
            if ($q->num_rows()) 
                return $q->row();
            return false;
        } // eof get_proverb_id()
    
    }

    // public function edit_proverb(){}
    // public function delete_proverb(){}
    // print_r($post); exit();
    // echo "<pre>";
    // print_r($array); 
    // exit();






