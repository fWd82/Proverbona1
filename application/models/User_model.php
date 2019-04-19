<?php

class User_model extends CI_Model{
    public function index(){
        // View all proverbs here
    }

    public function register_user($array){
        $this->load->database();
        return $this->db->insert('table_user', $array);
    }


    public function signin_user($username, $password){
        $q = $this->db->where(['user_name'=>$username, 'user_password'=>$password])
                      ->get('table_user');
        if ($q->num_rows()) {
            return $q->row()->user_id;
        }else{
            return FALSE;
        }
    }
 
    public function get_lang() { 
            $result = $this -> db -> select('lang_id, lang_name') -> get('table_lang') -> result_array(); 
     
            $user_nativelang = array(); 
            foreach($result as $r) { 
                $user_nativelang[$r['lang_id']] = $r['lang_name']; 
            } 
            $user_nativelang[''] = 'Select Language...'; 
            // echo "<pre>";
            // print_r ($user_nativelang); exit;
            return $user_nativelang; 
    }

    public function get_my_profile() {
         $myid = $this->session->userdata('login_id');
            $q = $this->db->from('table_user')
                        ->where(['user_id' => $myid])
                        ->join('table_lang', 'table_user.user_nativelang = table_lang.lang_id')
                        ->get();
            if ($q->num_rows()) 
                return $q->row();
            return false; 
    }

    public function edit_my_profile($my_id){
        // $this->load->view('admin/my_profile_edit');
        $q = $this->db
                ->select()
                ->where('user_id', $my_id)
                ->get('table_user');
        return $q->row();

    }
    public function update_my_profile($id, Array $post){
                // echo "<pre>";
                // print_r ($post);
                // echo "</pre>";

                return $this->db
                            ->where('user_id', $id)
                            ->update('table_user', $post);
    }


    public function get_user_profile($id) {
        $q = $this->db->from('table_user')
                    ->where( ['user_name' => $id] )
                    ->join('table_lang', 'table_user.user_nativelang = table_lang.lang_id')
                    ->get();
        if ($q->num_rows()) 
            return $q->row();
        return false;
    }      
}