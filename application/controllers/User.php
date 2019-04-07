<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function index(){
        if($this->session->userdata('login_id'))
            redirect('dashboard');
        $this->load->view('public/login');
        
        

    }

    public function user_login(){
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('user_name','Userame','required|trim');
		$this->form_validation->set_rules('user_password','Password','required|trim');

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		
		if( $this->form_validation->run() ) { //if validation passes
            //Validation Success


            $username = $this->input->post('user_name');
            $password = $this->input->post('user_password');

            $this->load->model('User_model');

            $login_id = $this->User_model->signin_user($username, $password);
            if ($login_id){
                // Login User
                $this->load->library('session');
                $this->session->set_userdata('login_id', $login_id); 

                $this->session->set_flashdata("feedback", "User Login Successfully");
                $this->session->set_flashdata("feedback_class", "alert-success");
                
                return redirect('dashboard');
                

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

    public function signup(){
        //fetch data from User_model 
        $data['user_lang'] = $this -> User_model -> get_lang(); 
        // $data['user_nativelang'] = $this->input->post('user_nativelang', TRUE);
        //pass data to view 
        $this -> load -> view('public/signup', $data); 

    } // eof function signup()
    
    public function user_register(){

        // $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('session');


        //fetch data from User_model 
        $data['user_lang'] = $this -> User_model -> get_lang(); 


        $this->form_validation->set_rules('user_fullname','Full Name','required');
		$this->form_validation->set_rules('user_email','Email Address','required|valid_email|trim|is_unique[table_user.user_email]',
        array('is_unique' => 'The %s provided already exists. Please signup.'));
		$this->form_validation->set_rules('user_name','User Name','required|is_unique[table_user.user_name]');
        $this->form_validation->set_rules('user_password','Password','required|trim');
        $this->form_validation->set_rules('user_conf_password','Password','required|trim|matches[user_password]');
        $this->form_validation->set_rules('user_nativelang','Native Language','required');
        
        // $this->form_validation->set_message('is_unique','The %s got to be unique');

        // $date_created = date('Y-m-d H:i:s');
        // $date_updated = date('Y-m-d H:i:s');
        

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		
		if( $this->form_validation->run() ) { //if validation passes
            //Validation Success
            $post = $this->input->post();
            unset($post['Submit']);
            unset($post['user_conf_password']);
            $this->load->model('User_model');
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
            //pass data to view 
            //Validation Fail
            $this -> load -> view('public/signup', $data); 
            // echo validation_errors();
        }

    } // eof function user_register()
    
    public function logout(){
        $this->session->unset_userdata('login_id');
        return redirect('user');
        
        
    }
    function __construct() {
        parent::__construct(); 
        //load model 
        $this -> load -> model('User_model'); 
    } 
}
?>