<?php
class User_model extends CI_Model{

    // Sign up / Register User
    public function register_user($array){
        $this->load->database();
        return $this->db->insert('table_user', $array);
    } // eof signin_user();

    // Sign in User
    public function signin_user($username, $password){
        $q = $this->db->where(['user_name'=>$username, 'user_password'=>$password])
                      ->get('table_user');
        if ($q->num_rows()) {
            return $q->row()->user_id;
        }else{
            return FALSE;
        }
    } // eof signin_user();
 
    // Get Languages for Drop Down in User registration and Add Proverb
    public function get_lang() {
            $result = $this -> db -> select('lang_id, lang_name') -> get('table_lang') -> result_array(); 
            $user_nativelang = array(); 
            foreach($result as $r) { 
                $user_nativelang[$r['lang_id']] = $r['lang_name']; 
            } 
            $user_nativelang[''] = 'Select Language...'; 
            return $user_nativelang; 
    } // eof get_lang();

    // Show My Profile in Detail View
    public function get_my_profile() {
         $myid = $this->session->userdata('login_id');
            $q = $this->db->from('table_user')
                        ->where(['user_id' => $myid])
                        ->join('table_lang', 'table_user.user_nativelang = table_lang.lang_id')
                        ->get();
            if ($q->num_rows()) 
                return $q->row();
            return false; 
    } // eof signin_user();

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
                // echo "<pre>";
                // print_r ($post);
                // echo "</pre>";
                return $this->db
                            ->where('user_id', $id)
                            ->update('table_user', $post);
    } // eof update_my_profile();

    public function proverb_favorite_list($limit, $offset){
        $query = $this->db
                            ->select(['table_proverb.proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_user.user_name', 'proverb_timestamp'])
                            // ->select()
                            ->from(' table_favorite_proverb')
                            ->order_by('favorite_proverb_timestamp', 'DESC')
                            ->join('table_user', 'table_favorite_proverb.user_id = table_user.user_id')
                            ->join('table_proverb', 'table_favorite_proverb.proverb_id = table_proverb.proverb_id')
                            ->limit($limit, $offset)
                            ->get();
        return $query->result();         
    } // eof proverb_favorite_list()

    // Fetch just all number of fav proverbs by user
    public function total_no_of_favorite_proverb(){
        $query = $this->db
                            ->select(['favorite_proverb_id'])
                            ->from('table_favorite_proverb')
                            ->get();
        return $query->num_rows();         
    } // eof total_no_of_favorite_proverb()
}