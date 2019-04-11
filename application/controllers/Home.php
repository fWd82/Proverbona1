<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends CI_Controller{
        public function index(){
            $this->load->model('Proverbs_model');
            $all_proverbs = $this->Proverbs_model->proverb_list();
            // $my_proverbs = $this->Proverbs_model->get_proverb_id($id);
            $this->load->view('public/home', ['all_proverb1'=>$all_proverbs]);
        }
        public function proverb($id){
            $this->load->model('Proverbs_model');
            $my_proverbs = $this->Proverbs_model->get_proverb_id($id);
            $this->load->view('public/proverb_detail', compact('my_proverbs'));
        } // eof proverb();

        public function my_profile(){
            $id = $this->session->userdata('login_id');
            $this->load->model('User_model');
            $my_profile = $this->User_model->get_my_profile($id);
            $this->load->view('admin/my_profile', compact('my_profile'));
        } // eof my_profile();


        public function user_profile($id){
            $this->load->model('User_model');
            $user_profile = $this->User_model->get_user_profile($id);
            $this->load->view('admin/user_profile', compact('user_profile'));
        } // eof user_profile();
    }
?>