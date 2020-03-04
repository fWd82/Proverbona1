<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    // Show admin Screen
    public function index(){
        $this->load->view('admin/admin_dashboard');
        
    } 

    // Show all Feedbacks on Admin Screen
    function show_feedbacks(){
        $this->load->library('pagination');

                $config['base_url']         = base_url('admin/show_feedbacks');
                $config['total_rows']       = $this->Admin_model->num_rows_feedback();
                $config['per_page']         = 5;
                $config['full_tag_open']    = '<ul class="pagination">';
                $config['full_tag_close']   = '</ul>';
                $config['attributes']       = ['class' => 'page-link'];
                $config['first_link']       = false;
                $config['last_link']        = false;
                $config['first_tag_open']   = '<li class="page-item">';
                $config['first_tag_close']  = '</li>';
                $config['prev_link']        = '&laquo';
                $config['prev_tag_open']    = '<li class="page-item">';
                $config['prev_tag_close']   = '</li>';
                $config['next_link']        = '&raquo';
                $config['next_tag_open']    = '<li class="page-item">';
                $config['next_tag_close']   = '</li>';
                $config['last_tag_open']    = '<li class="page-item">';
                $config['last_tag_close']   = '</li>';
                $config['cur_tag_open']     = '<li class="page-item active"><a href="#" class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></a></li>';
                $config['num_tag_open']     = '<li class="page-item">';
                $config['num_tag_close']    = '</li>';

            $this->pagination->initialize($config);

            $all_feedbacks = $this->Admin_model->feedback_list($config['per_page'], $this->uri->segment(3));
            $total_all_feedbacks = $this->Admin_model->num_rows_feedback();
            $this->load->view('admin/feedbacks_list', ['all_feedbacks1'=>$all_feedbacks, 'total_all_feedbacks'=>$total_all_feedbacks]);
        
    } // eof show_feedbacks()

    // Show all Feedbacks on Admin Screen
    function show_users(){
        $this->load->library('pagination');

                $config['base_url']         = base_url('admin/show_users');
                $config['total_rows']       = $this->Admin_model->num_rows_users();
                $config['per_page']         = 10;
                $config['full_tag_open']    = '<ul class="pagination">';
                $config['full_tag_close']   = '</ul>';
                $config['attributes']       = ['class' => 'page-link'];
                $config['first_link']       = false;
                $config['last_link']        = false;
                $config['first_tag_open']   = '<li class="page-item">';
                $config['first_tag_close']  = '</li>';
                $config['prev_link']        = '&laquo';
                $config['prev_tag_open']    = '<li class="page-item">';
                $config['prev_tag_close']   = '</li>';
                $config['next_link']        = '&raquo';
                $config['next_tag_open']    = '<li class="page-item">';
                $config['next_tag_close']   = '</li>';
                $config['last_tag_open']    = '<li class="page-item">';
                $config['last_tag_close']   = '</li>';
                $config['cur_tag_open']     = '<li class="page-item active"><a href="#" class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></a></li>';
                $config['num_tag_open']     = '<li class="page-item">';
                $config['num_tag_close']    = '</li>';

            $this->pagination->initialize($config);

            $all_users = $this->Admin_model->users_list($config['per_page'], $this->uri->segment(3));
            $total_no_of_users = $this->Admin_model->num_rows_users();
            $this->load->view('admin/users_list', ['all_users1'=>$all_users, 'total_no_of_users'=>$total_no_of_users]);
        
    }

    // Ban user from not contributing
    function temp_ban_user($user_name){ 
        if($this->Admin_model->temp_ban_user($user_name, 0)){
            // redirect("user/user_profile/{$user_name}");
            echo "<script>alert('User baned')</script>";
        }else {
            echo "<script>alert('Some problem occured')</script>";
        }
    }

    // Delete Proverb
    function delete_proverb($proverb_id){
        if($this->Admin_model->delete_proverb($proverb_id)){
            redirect("proverb");
        }
    }

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');

        $user_type = $this->session->userdata('login_usertype');
        if (!$user_type == 'admin' || !$user_type == 'moderator' || $user_type = null ) {
            redirect('proverb');
            // redirect('user');
        }
    } // eof __construct();        
}        