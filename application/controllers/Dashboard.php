<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function index(){
        $this->load->view('admin/dashboard');
    } // eof index();

    // Go to Add Proverb Page
    public function add_proverb(){
        $this->load->model('Proverbs_model');
        $this->load->model('User_model');
        $data['user_lang'] = $this -> User_model -> get_lang(); 
        $data['dd_reference'] = $this -> Proverbs_model -> get_reference(); 
        $this->load->view('admin/add_proverb', $data);
    } // eof add_proverb();

    // Insert Proverb
    public function insert_proverb(){
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('Proverbs_model');
        $this->load->model('User_model');
        $data['user_lang'] = $this -> User_model -> get_lang(); 
        $data['dd_reference'] = $this -> Proverbs_model -> get_reference(); 

		$this->form_validation->set_rules('proverb_statement','Proverb Statement','required');
		// $this->form_validation->set_rules('proverb_history','Proverb History',    'required');

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		
		if( $this->form_validation->run() ) { //if validation passes
            //Validation Success
            $post = $this->input->post();
            unset($post['Submit']);
            $this->load->model('Proverbs_model');

            if($this->Proverbs_model->add_proverb($post)){

                $this->session->set_flashdata("feedback", "Successfully added to database");
                $this->session->set_flashdata("feedback_class", "alert-success");
                echo "Successfully added to database";
                $this->load->view('admin/add_proverb', $data);

            }else{
                $this->session->set_flashdata("feedback", "Failed to add to database");
                $this->session->set_flashdata("feedback_class", "alert-danger");
                $this->load->view('admin/add_proverb', $data);
                echo "Failed to add to database";
            }
        }else{
            //Validation Fail
            $this->load->view('admin/add_proverb', $data);
            // echo validation_errors();
        }
    } // eof insert_proverb();
    
    // Rate Proverb from Proverb_Details Page
    public function rate_proverb(){
        $this->load->model('Proverbs_model');
        $post = $this->input->post();
        unset($post['Submit']);
        $this->Proverbs_model->rate_proverb($post);
        $proverb_id = $this->input->post('proverb_id');
        redirect("home/proverb/{$proverb_id}");
    } // eof rate_proverb();

    // Constructor
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('login_id')){
            redirect('user');
        }
                    
    } // eof __construct();
    
} // eof Dashboard class
?>