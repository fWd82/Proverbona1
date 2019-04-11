<?php

class User_model extends CI_Model{
    public function index(){
        // View all proverbs here
    }


    public function register_user($array){
        $this->load->database();
        return $this->db->insert('table_user', $array);
        // print_r($post); exit();
        // echo "<pre>";
        // print_r($array); 
        // exit();
    }


    public function signin_user($username, $password){

        $q = $this->db->where(['user_name'=>$username, 'user_password'=>$password])
                      ->get('table_user');

        if ($q->num_rows()) {
            return $q->row()->user_id;
        }else{
            return FALSE;
        }


        // $this->load->database();
        // return $this->db->insert('table_user', $array);
        // print_r($post); exit();
        // echo "<pre>";
        // print_r($username . " - " . $password); 
        // exit();
        
    }


    // public function edit_proverb(){}
    // public function delete_proverb(){}
 
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
            $q = $this->db->from('table_user')
                        // ->where( ['proverb_id' => $id] )
                        ->get();
            if ($q->num_rows()) 
                return $q->row();
            return false;
    }


    public function get_user_profile($id) {
        $q = $this->db->from('table_user')
                    ->where( ['user_name' => $id] )
                    ->get();
        if ($q->num_rows()) 
            return $q->row();
        return false;
    }
       
}