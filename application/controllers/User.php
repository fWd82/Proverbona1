<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    // Show User Login Page
    public function index(){
        // Check if login
        if($this->session->userdata('login_id'))
            redirect('dashboard');
        $this->load->view('public/login');
    } // eof index();    

    // User Login
    public function user_login(){
        // Check if login
        if($this->session->userdata('login_id'))
            redirect('dashboard');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name','Userame','required|trim');
		$this->form_validation->set_rules('user_password','Password','required|trim');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if( $this->form_validation->run() ) { //if validation passes
            //Validation Success
            $username = $this->input->post('user_name');
            $password = $this->input->post('user_password');
            $login_id = $this->User_model->signin_user($username, $password);
            if ($login_id){
                // Login User 
                $this->session->set_userdata('login_id',       $login_id->user_id); 
                $this->session->set_userdata('login_username', $login_id->user_name);
                $this->session->set_userdata('login_usertype', $login_id->user_type);
                $this->session->set_flashdata("feedback", "User Login Successfully");
                $this->session->set_flashdata("feedback_class", "alert-success");
                // return redirect('dashboard');
 
                $user_type = $login_id->user_type;
                if ($user_type == "admin") {
                    redirect('admin');
                }else if($user_type == "moderator"){
                    redirect('admin'); 
                }else if($user_type == "user"){
                    redirect('proverb');
                    // $this->load->view('admin/dashboard');
                }else{
                    redirect('dashboard');
                }

            }else{
                //  Failed Login
                $this->session->set_flashdata("feedback", "Failed to Login");
                $this->session->set_flashdata("feedback_class", "alert-danger");
                $this->load->view('public/login');
                // echo "Failed to login";
                }
            }else{
            //Validation Fail
            $this->load->view('public/login');
            // echo validation_errors();
        }
    } // eof function user_login()

    // Register
    public function signup(){
        // Check if login
        if($this->session->userdata('login_id')){
            redirect('dashboard');
        }else{
            //fetch data from User_model 
            $data['user_lang'] = $this -> User_model -> get_lang();
            //pass data to view  
            $this -> load -> view('public/signup', $data); 
        }
    } // eof function signup()
    
    // User Register
    public function user_register(){
        if($this->session->userdata('login_id'))
            redirect('dashboard');
        // $this->load->database();
        $this->load->library('form_validation');
        //fetch data from User_model 
        $data['user_lang'] = $this -> User_model -> get_lang(); 
        $this->form_validation->set_rules('user_fullname','Full Name','required');
		$this->form_validation->set_rules('user_email','Email Address','required|valid_email|trim|is_unique[table_user.user_email]',
        array('is_unique' => 'The %s provided already exists. Please signup.'));
		$this->form_validation->set_rules('user_name','User Name','required|is_unique[table_user.user_name]');
        $this->form_validation->set_rules('user_password','Password','required|trim');
        $this->form_validation->set_rules('user_conf_password','Password','required|trim|matches[user_password]');
        $this->form_validation->set_rules('user_nativelang','Native Language','required');

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		
		if( $this->form_validation->run() ) { //if validation passes
            //Validation Success
            $post = $this->input->post();
            unset($post['Submit']);
            unset($post['user_conf_password']); 
            if($this->User_model->register_user($post)){
                $this->session->set_flashdata("feedback", "User Successfully Resgistered");
                $this->session->set_flashdata("feedback_class", "alert-success");
                // echo "Successfully added to database";
                $this->load->view('admin/add_proverb');
            }else{
                $this->session->set_flashdata("feedback", "Failed to add to database");
                $this->session->set_flashdata("feedback_class", "alert-danger");
                $this->load->view('public/signup');
                // echo "Failed to add to database";
            }
        }else{
            $data['user_nativelang'] = $this->input->post('user_nativelang', TRUE);
            //Validation Fail
            $this -> load -> view('public/signup', $data); 
            // echo validation_errors();
        }
    } // eof function user_register()

    // Logout
    public function logout(){
        $this->session->unset_userdata('login_id');
        $this->session->unset_userdata('login_username');
        $this->session->unset_userdata('login_usertype');
        return redirect('user');
    } // eof function logout()
    
     
    // Edit my profile
    public function edit_my_profile(){
        if(!$this->session->userdata('login_id'))
            redirect('user');
        $id = $this->session->userdata('login_id'); 
        $data['user_lang'] = $this -> User_model -> get_lang();
        $data['my_data'] = $this -> User_model -> edit_my_profile($id);
        $this->load->view('admin/my_profile_edit', $data); 
    } // eof edit_my_profile();

    // Update my profile
    public function update_my_profile(){
        if(!$this->session->userdata('login_id'))
            redirect('user');
        $this->load->library('form_validation');
        // $this->load->library('session');
        $id = $this->session->userdata('login_id'); 
        //fetch data from User_model 
        $data['user_lang'] = $this -> User_model -> get_lang(); 
        $data['my_data'] = $this -> User_model -> edit_my_profile($id);

        $this->form_validation->set_rules('user_fullname','Full Name','required');
        $this->form_validation->set_rules('user_name','User Name','required');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            
        if( $this->form_validation->run() ) { //if validation passes
            //Validation Success
            $post = $this->input->post();
            $user_name = $this->input->post('user_name');
            unset($post['user_timestamp']);
            unset($post['Submit']);
 
            if($this->User_model->update_my_profile($id, $post)){

                $this->session->set_flashdata("feedback", "Updated Successfully");
                $this->session->set_flashdata("feedback_class", "alert-success");
                // echo "Successfully added to database";
                // $this->load->view('admin/add_proverb');
                $this->load->view('admin/my_profile_edit', $data); 
                // sleep(5);
                header("Refresh: 2; user_profile/{$user_name}");
                // redirect('user/my_profile','refresh');
            }else{
                $this->session->set_flashdata("feedback", "Failed to Updated");
                $this->session->set_flashdata("feedback_class", "alert-danger");
                $this->load->view('admin/my_profile_edit', $data); 
                // echo "Failed to add to database";
            }
        }else{
            $data['user_nativelang'] = $this->input->post('user_nativelang', TRUE);
            //pass data to view 
            //Validation Fail
            $this->load->view('admin/my_profile_edit', $data); 
            // echo validation_errors();
        }
    } // eof update_my_profile();

    // User Profile
    public function user_profile($user_name){
        $user_profile = $this->User_model->get_user_profile($user_name);
        $total_all_proverbs = $this->Statistics_model->total_no_of_proverbs_added_by_user($user_name);
        $total_all_fav_proverbs = $this->User_model->total_no_of_favorite_proverb();
        $this->load->view('admin/user_profile', compact('user_profile', 'total_all_proverbs', 'total_all_fav_proverbs'));
    } // eof user_profile();


    // User Profile > contribution
    public function contribution($user_name){

                $this->load->library('pagination');

                $config['base_url']         = base_url('proverb/index');
                $config['total_rows']       = $this->Statistics_model->total_no_of_proverbs_added_by_user($user_name);
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


            $all_proverbs = $this->User_model->user_contribution_proverb_added($config['per_page'], $this->uri->segment(3), $user_name);
            $total_all_proverbs = $this->Statistics_model->total_no_of_proverbs_added_by_user($user_name);
            
            $this->load->view('public/user_contribution', ['all_proverb1'=>$all_proverbs, 'total_all_proverbs'=>$total_all_proverbs]);
        
    } // eof user_profile();

    // Constructor
    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Proverbs_model');
        $this->load->model('Statistics_model');
    } // eof constructor __construct()
} // eof class User