<?php
    class Proverbs_model extends CI_Model{
        public function proverb_list(){

            // SELECT proverb_id, proverb_statement, proverb_tags, table_user.user_name, proverb_timestamp
            // FROM `table_proverb` 
            // INNER JOIN table_user ON 
            //      table_proverb.proverb_addedby = table_user.user_id;
            
            $this->load->database();
            $query = $this->db
                                ->select(['proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_reference.reference_title', 'table_user.user_name', 'proverb_timestamp'])
                                ->from('table_proverb')
                                ->order_by('proverb_timestamp', 'DESC')
                                ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                                ->join('table_reference', 'table_proverb.proverb_reference = table_reference.reference_id')
                                ->get(); 
            return $query->result();
        } // eof proverb_list()

        // Insert Proverb to DB
        public function add_proverb($array){
            $this->load->database();
            return $this->db->insert('table_proverb', $array);
        } // eof add_proverb()
        
        // Insert Rate Proverb value to DB
        public function rate_proverb($array){
            $this->load->database();
            return $this->db->insert('table_rating_proverb', $array);
        } // eof rate_proverb()

        // Get all references for Drop Down
        public function get_reference() {
            $result = $this 
                        -> db 
                        -> select('reference_id, reference_category, reference_title, reference_author') 
                        -> get('table_reference') 
                        -> result_array(); 
            $proverb_reference = array(); 
            foreach($result as $r) { 
                $proverb_reference[$r['reference_id']] = $r['reference_category']  . ": " . $r['reference_title'] . " - " . $r['reference_author']; 
            } 
            $proverb_reference[''] = 'Select Reference...'; 
            return $proverb_reference; 
        } // eof get_reference()

        // For Proverb Detail Page
        public function get_proverb_id($id) {
            $q = $this->db->from('table_proverb')
                        ->where( ['proverb_id' => $id] )
                        ->join('table_lang', 'table_proverb.proverb_lang = table_lang.lang_id')
                        ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                        ->join('table_reference', 'table_proverb.proverb_reference = table_reference.reference_id')
                        ->get();
            if ($q->num_rows()) 
                return $q->row();
            return false;
        } // eof get_proverb_id()

        // For Profile Detail Page
        public function get_reference_profile($id) {
            $q = $this->db->from('table_reference')
                        ->where( ['reference_id' => $id] )
                        ->get();
            if ($q->num_rows()) 
                return $q->row();
            return false;
        } // eof get_reference_profile()

    
    }
    // public function edit_proverb(){}
    // public function delete_proverb(){}