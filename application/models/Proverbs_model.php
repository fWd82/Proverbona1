<?php
    class Proverbs_model extends CI_Model{
        public function proverb_list($limit, $offset){
            $query = $this->db
                                ->select(['proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_reference.reference_title', 'table_user.user_name', 'proverb_timestamp'])
                                ->from('table_proverb')
                                ->order_by('proverb_timestamp', 'DESC')
                                ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                                ->join('table_reference', 'table_proverb.proverb_reference = table_reference.reference_id')
                                ->limit($limit, $offset)
                                ->get();
            return $query->result(); 
        } // eof proverb_list()

        // Returning total number of Proverbs for Pagination
        public function num_rows_proverbs(){
            $query = $this->db
                                ->select(['proverb_id'])
                                ->from('table_proverb')
                                ->get();
            return $query->num_rows(); 
        } // eof num_rows_proverbs()

        // Insert Proverb to DB
        public function add_proverb($array){
            $this->load->database();
            return $this->db->insert('table_proverb', $array);
        } // eof add_proverb()
        
        // Edit Proverb
        public function edit_proverb($proverb_id){
            $q = $this->db
                    ->select()
                    ->where('proverb_id', $proverb_id)
                    ->get('table_proverb');
            return $q->row();
        }// eof edit_proverb();

        // Update Proverb
        public function update_proverb($id, Array $post){
                    return $this->db
                                ->where('proverb_id', $id) 
                                ->update('table_proverb', $post); 
        }// eof update_proverb();

        // Insert/Update Contributors for Proverbs
        public function update_proverb_contributors($proverb_id, $user_id){
            return $this->db->insert('table_proverb_contributors', 
                                    ['tpc_proverb_id'=>$proverb_id, 
                                    'tpc_user_id'=>$user_id]);
        }// eof update_proverb_contributors();

        // Fetch Contributors for indiual proverb in Proverb Details Page
        public function proverb_contributors($proverb_id){ 
            $query = $this->db
                                ->select(['table_user.user_name'])
                                ->from('table_proverb_contributors')
                                ->where('tpc_proverb_id', $proverb_id)
                                ->join('table_user', 'table_proverb_contributors.tpc_user_id = table_user.user_id')
                                ->join('table_proverb', 'table_proverb_contributors.tpc_proverb_id = table_proverb.proverb_id')
                                ->distinct()
                                ->get();
            return $query->result(); 
        } // eof proverb_contributors()

        // Insert Rate Proverb value to DB
        public function rate_proverb($array){
            $this->load->database();
            return $this->db->insert('table_rating_proverb', $array);
        } // eof rate_proverb();


        // Get all references for Drop Down
        public function get_reference() {
            $result = $this 
                        -> db 
                        -> select('reference_id, reference_category, reference_title, reference_author') 
                        -> get('table_reference') 
                        -> result_array(); 
            $proverb_reference = array();
            $proverb_reference[''] = 'Select Reference...'; 
            foreach($result as $r) {
                $proverb_reference[$r['reference_id']] = $r['reference_category']  . ": " . $r['reference_title'] . " - " . $r['reference_author']; 
            }
            return $proverb_reference; 
        } // eof get_reference();

        // For Proverb Detail Page
        public function get_proverb_in_detail($id) {
            $q = $this->db->from('table_proverb')
                        ->where( ['proverb_id' => $id] )
                        ->join('table_lang', 'table_proverb.proverb_lang = table_lang.lang_id')
                        ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                        ->join('table_reference', 'table_proverb.proverb_reference = table_reference.reference_id')
                        ->get();
            if ($q->num_rows()) 
                return $q->row();
            return false;
        } // eof get_proverb_in_detail();


        // Get individual Proverbs Rating
        function proverbs_individual_rating($id){
            // $this->load->database();
            $query = $this->db
                            ->select()
                            ->from('table_rating_proverb')
                            ->where('proverb_id', $id)
                            ->get();
            if ($query->num_rows()) 
                return $query->result();
            return false; 
        }// eof proverbs_individual_rating()
        
        public function display_proverb($limit, $offset, $option){
            if ($option == 0) {
                $query = $this->db
                                ->select(['proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_reference.reference_title', 'table_user.user_name', 'proverb_timestamp'])
                                ->from('table_proverb')
                                ->order_by('proverb_timestamp', 'DESC')
                                ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                                ->join('table_reference', 'table_proverb.proverb_reference = table_reference.reference_id')
                                ->limit($limit, $offset)
                                ->get();
                return $query->result(); 
            }else {
                $query = $this->db
                                ->select(['proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_reference.reference_title', 'table_user.user_name', 'proverb_timestamp'])
                                ->from('table_proverb')
                                ->where('proverb_lang', $option)
                                ->order_by('proverb_timestamp', 'DESC')
                                ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                                ->join('table_reference', 'table_proverb.proverb_reference = table_reference.reference_id')
                                ->limit($limit, $offset)
                                ->get();
                return $query->result(); 
            }
        } // eof display_proverb()
        
        // Returning total number of Proverbs for Pagination
        public function num_rows_proverbs_for_lang($proverb_lang){
            $query = $this->db
                                ->select(['proverb_id'])
                                ->from('table_proverb')
                                ->where('proverb_lang', $proverb_lang)
                                ->get();
            return $query->num_rows(); 
        } // eof num_rows_proverbs_for_lang()
        
} // eof class Proverbs_model