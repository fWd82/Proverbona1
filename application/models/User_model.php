<?php
class User_model extends CI_Model{

    // Sign up / Register User
    public function register_user($array){
        $this->load->database();
        return $this->db->insert('table_user', $array);
    } // eof signin_user();

    // Sign in User | ACTIVE RECORDS
    public function signin_user($username, $password){
        $q = $this->db->where(['user_name'=>$username, 'user_password'=>$password])
                      ->get('table_user');
        if ($q->num_rows()) {
            return $q->row();
        }else{
            return FALSE;
        }
    } // eof signin_user();
 
    // Get Languages for Drop Down in User registration and Add Proverb
    public function get_lang() {
            $result = $this -> db -> select('lang_id, lang_name') -> get('table_lang') -> result_array(); 
            $user_nativelang = array(); 
            $user_nativelang[''] = 'Select Language...'; 
            foreach($result as $r) { 
                $user_nativelang[$r['lang_id']] = $r['lang_name']; 
            } 
            
            return $user_nativelang; 
    } // eof get_lang();
 
    // Show User Other Profile
    public function get_user_profile($id) {
        $q = $this->db->from('table_user')
                    ->where( ['user_name' => $id] )
                    ->join('table_lang', 'table_user.user_nativelang = table_lang.lang_id')
                    ->get();
        if ($q->num_rows()) 
            return $q->row();
        return false;
    } // eof get_user_profile();

    // Edit my profile
    public function edit_my_profile($my_id){
        $q = $this->db
                ->select()
                ->where('user_id', $my_id)
                ->get('table_user');
        return $q->row();
    } // eof edit_my_profile();
    
    // Update my profile
    public function update_my_profile($id, Array $post){
                return $this->db
                            ->where('user_id', $id)
                            ->update('table_user', $post);
    } // eof update_my_profile();

    public function proverb_favorite_list($limit, $offset){
        $query = $this->db
                            ->select(['favorite_proverb_id', 'table_proverb.proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_user.user_name', 'proverb_timestamp'])
                            ->from('table_favorite_proverb')
                            ->order_by('favorite_proverb_timestamp', 'DESC')
                            ->join('table_user', 'table_favorite_proverb.user_id = table_user.user_id')
                            ->join('table_proverb', 'table_favorite_proverb.proverb_id = table_proverb.proverb_id')
                            ->limit($limit, $offset)
                            ->get();
        return $query->result();         
    } // eof proverb_favorite_list()

    // Delete my favorite
    public function delete_my_favorite($id){
                return $this->db
                            ->where('favorite_proverb_id', $id)
                            ->delete('table_favorite_proverb');
    } // eof delete_my_favorite();

    // Fetch just all number of fav proverbs by user
    public function total_no_of_favorite_proverb(){
        $query = $this->db
                            ->select(['favorite_proverb_id'])
                            ->from('table_favorite_proverb')
                            ->get();
        return $query->num_rows();
    } // eof total_no_of_favorite_proverb()

    // List of Users who added some proverbs
    public function user_contribution_proverb_added($limit, $offset, $user_name){
        $query = $this->db
                            ->select(['proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_reference.reference_title', 'table_user.user_name', 'proverb_timestamp'])
                            ->from('table_proverb')
                            ->where('table_user.user_name', $user_name)
                            ->order_by('proverb_timestamp', 'DESC')
                            ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                            ->join('table_reference', 'table_proverb.proverb_reference = table_reference.reference_id')
                            ->limit($limit, $offset)
                            ->get();
        return $query->result(); 
    } // eof proverb_list()
}