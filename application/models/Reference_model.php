<?php
    class Reference_model extends CI_Model{
        // List of all Reference
        public function reference_list(){ 
            $query = $this->db
                            ->select(['reference_id', 'reference_lang', 'reference_title', 'reference_category', 'reference_author', 'reference_introduction', 'reference_published_year', 'reference_img_path', 'reference_timestamp', 'table_user.user_name'])
                            ->from('table_reference')
                            ->order_by('reference_timestamp', 'DESC')
                            ->join('table_user', 'table_reference.reference_addedby = table_user.user_id')
                            ->get();
            return $query->result();
        } // eof proverb_list()        
        // Add Reference
        public function add_reference($array){
            $this->load->database();
            return $this->db->insert('table_reference', $array);
        } // eof add_reference()

        // Edit reference
        public function edit_reference($reference_id){
            $q = $this->db
                    ->select()
                    ->where('reference_id', $reference_id)
                    ->get('table_reference');
            return $q->row();
        }// eof edit_reference();

        // Update reference
        public function update_reference($reference_id, Array $post){
                    return $this->db
                                ->where('reference_id', $reference_id)
                                ->update('table_reference', $post);
        }// eof update_reference();

        // For Reference Profile Detail Page
        public function get_reference_profile($id) {
            $q = $this->db->from('table_reference')
                        ->join('table_user', 'table_reference.reference_addedby = table_user.user_id')
                        ->where( ['reference_id' => $id] )
                        ->get();
            if ($q->num_rows()) 
                return $q->row();
            return false;
        } // eof get_reference_profile();        

        // Get Languages for Drop Down in Add Reference and Edit Reference.
        public function get_lang() {
            $result = $this->db->select('lang_id, lang_name') 
                                -> get('table_lang')
                                ->result_array(); 
            $user_nativelang = array(); 
            foreach($result as $r) { 
                $user_nativelang[$r['lang_id']] = $r['lang_name']; 
            } 
            $user_nativelang[''] = 'Select Language...'; 
            return $user_nativelang; 
        } // eof get_lang();        
    

    } // eof Class
?>