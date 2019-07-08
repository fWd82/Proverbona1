<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    // Load / View Dashboard
    public function index(){
        $data['title'] = 'Dashboard';
        $this->load->view('admin/dashboard', $data);
    } // eof index();
 
    public function todo(){
        $this->load->view('admin/todo');
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