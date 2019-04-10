<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends CI_Controller{
        public function index(){
            $this->load->model('Proverbs_model');

            $all_proverbs = $this->Proverbs_model->proverb_list();
            $this->load->view('public/home', ['all_proverb1'=>$all_proverbs]);
        }
        public function proverb($id){
            $this->load->model('Proverbs_model');
            $my_proverbs = $this->Proverbs_model->get_proverb_id($id);
            $this->load->view('public/proverb_detail', compact('my_proverbs'));
        }
    }

?>