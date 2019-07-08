<?php
    class Contributors_model extends CI_Model{
        // List of all Reference
        public function contributors_list(){ 
            $query = $this->db
                            // ->select(['tm_id', 'reference_lang', 'reference_title', 'reference_category', 'reference_author', 'reference_introduction', 'reference_published_year', 'reference_img_path', 'reference_timestamp', 'table_user.user_name'])
                            ->select(['tm_id', 'table_user.user_name', 'table_user.user_fullname', 'tm_title', 'tm_description', 'tm_image_link', 'tm_organization', 'tm_personal_website', 'tm_org_website', 'tm_org_email', 'tm_personal_email', 'tm_facebook', 'tm_twitter', 'tm_github', 'tm_other_link', 'tm_timestamp'])
                            ->from('table_team_members')
                            ->join('table_user', 'table_team_members.tm_user_id = table_user.user_id')
                            ->order_by('tm_timestamp', 'DESC')
                            ->get();
            return $query->result();
        } // eof proverb_list()

        // For Reference Profile Detail Page
        public function get_contributor_profile($username) {
            $q = $this->db->from('table_team_members')
                        ->join('table_user', 'table_team_members.tm_user_id = table_user.user_id')
                        ->where( ['tm_username' => $username] )
                        ->get();
            if ($q->num_rows()) 
                return $q->row();
            return false;
        } // eof get_reference_profile();   

        // Edit reference
        public function edit_contributor($username){
            $q = $this->db
                     ->select()
                     ->where('tm_username', $username)
                     ->get('table_team_members');
            return $q->row();
        }// eof edit_reference();

        // Update reference
        public function update_contributor($username, Array $post){
                    return $this->db
                                ->where('tm_username', $username)
                                ->update('table_team_members', $post);
        }// eof update_reference();

  
//////////////////////////////////////

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