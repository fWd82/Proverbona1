<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    // Load / View Dashboard
    public function index(){
 
        $username = $this->session->userdata('login_username');
        $this->load->model('Statistics_model');
        $this->load->model('User_model');

        $data['title']                   = 'Dashboard';
        $data['total_all_proverbs']      = $this->Statistics_model->total_no_of_proverbs_added_by_user($username);
        $data['total_all_fav_proverbs']  = $this->User_model->total_no_of_favorite_proverb();
        $this->load->view('admin/dashboard', $data);
    } // eof index();
 
    public function todo(){
        $data['title']                   = 'ToDo';
        $this->load->view('admin/todo', $data);
    } // eof index();
 
    public function for_ui_ux(){
        $data['title'] = 'UI/UX';
        $this->load->view('admin/for_ui_ux', $data);
    } // eof index();

    // Constructor
    public function __construct(){
        parent::__construct(); 
        if (!$this->session->userdata('login_id')) {
            redirect('user');
        }
    } // eof __construct();
    
} // eof Dashboard class