<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function index(){
        $this->load->view('admin/dashboard');
    }

    public function add_proverb(){
        $this->load->view('admin/add_proverb');
    }

    public function insert_proverb(){
        // echo "Reached Insert Proverb";
        // $this->load->view('admin/add_proverb');
        $this->load->library('form_validation');
        $this->load->library('session');

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
                $this->load->view('admin/add_proverb');

            }else{
                $this->session->set_flashdata("feedback", "Failed to add to database");
                $this->session->set_flashdata("feedback_class", "alert-danger");
                $this->load->view('admin/add_proverb');
                echo "Failed to add to database";
            }
        }else{
            //Validation Fail
            $this->load->view('admin/add_proverb');
            // echo validation_errors();
        }
    }
    

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('login_id')){
            redirect('user');
        }
                    
    }
    
}
?>