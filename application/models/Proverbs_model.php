<?php

class Proverbs_model extends CI_Model{
    public function index(){
        // View all proverbs here
    }

    public function proverb_list(){
        $this->load->database();
        $query = $this->db
							->select(['id','proverbstatement', 'proverbhistory', 'added_on'])
							->from('testtable')
							->get();
							
		return $query->result();
    }


    public function add_proverb($array){
        $this->load->database();
        return $this->db->insert('table_proverb', $array);

        
        // print_r($post); exit();
        // echo "<pre>";
        // print_r($array); 
        // exit();
        
    }
    // public function edit_proverb(){}
    // public function delete_proverb(){}

}




