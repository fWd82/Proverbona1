<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller{
    public function index(){
        $this->load->view('public/add_feedback');
    }
    public function insert_feedback(){
        
        
        
 

        $this->load->library('form_validation');
        

        $this->form_validation->set_rules('feedback_type','Feedback Type','required');
		$this->form_validation->set_rules('feedback_title','Feedback Title','required');
		$this->form_validation->set_rules('feedback_body','Feedback Body','required');
         
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		
		if( $this->form_validation->run() ) { //if validation passes
            //Validation Success
            $feedback_post = $this->input->post();
            unset($feedback_post['Submit']);

            $this->load->model('Feedback_model');

            if($this->Feedback_model->insert_feedback($feedback_post)){

                $this->session->set_flashdata("feedback", "Feedback Successfully Sent");
                $this->session->set_flashdata("feedback_class", "alert-success");
                // echo "Successfully added to database";
                $this->load->view('public/add_feedback');

            }else{
                $this->session->set_flashdata("feedback", "Failed to add to database");
                $this->session->set_flashdata("feedback_class", "alert-danger");
                $this->load->view('public/add_feedback');
                echo "Failed to add to database";
            }
        }else{
            //Validation Fail
            $this->load->view('public/add_feedback');
            // echo validation_errors();
        }
        

        // ----------------
    }
}



?>