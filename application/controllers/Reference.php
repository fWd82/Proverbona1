<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Reference extends CI_Controller{
        // Show all proverbs on Main Screen
        public function index(){
            $all_reference = $this->Reference_model->reference_list();
            $this->load->view('public/reference_all_list', ['all_reference1'=>$all_reference]);
        } // eof index();

        // Reference Profile
        public function reference_profile($id){
            $reference_profile = $this->Reference_model->get_reference_profile($id);
            if (!$reference_profile)
                show_404();

            $this->load->view('admin/reference_profile', compact('reference_profile'));
        } // eof reference_profile();    

        // Go to Add Reference Page
        public function add_reference(){
            if(!$this->session->userdata('login_id')){
                redirect('user');
            }
            $data['user_lang'] = $this -> User_model -> get_lang(); 
            // $data['dd_reference'] = $this -> Proverbs_model -> get_reference(); 
            $this->load->view('admin/add_reference', $data); 
        } // eof add_reference();

        // Insert Reference
        public function insert_reference(){
            if(!$this->session->userdata('login_id')){
                redirect('user');
            }    
            $this->load->library('form_validation');
            $data['user_lang'] = $this -> User_model -> get_lang();  

            $this->form_validation->set_rules('reference_title','Reference Title','required');
            $this->form_validation->set_rules('reference_category','Reference Category','required');
            
            $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            
            if( $this->form_validation->run() ) { //if validation passes
                //Validation Success
                $post = $this->input->post();
                unset($post['Submit']);

                if($this->Reference_model->add_reference($post)){
                    $this->session->set_flashdata("feedback", "Reference Successfully Added");
                    $this->session->set_flashdata("feedback_class", "alert-success");
                    //echo "Successfully added to database";
                    $this->load->view('admin/add_reference', $data);
                }else{
                    $this->session->set_flashdata("feedback", "Failed to add to database");
                    $this->session->set_flashdata("feedback_class", "alert-danger");
                    $this->load->view('admin/add_reference', $data);
                    echo "Failed to add to database";
                }
            }else{
                //Validation Fail
                $this->load->view('admin/add_reference', $data);
                // echo validation_errors();
            }
        } // eof insert_reference();

        // Edit reference
        public function edit_reference($reference_id){
            if(!$this->session->userdata('login_id')){
                redirect('user');
            }
            $data['user_lang'] = $this->User_model->get_lang();
            $data['edit_reference'] = $this->Reference_model->edit_reference($reference_id);
            if (!$data['edit_reference'])
             show_404();

            $id = $this->session->userdata('login_id');
            $this->load->view('admin/edit_reference', $data);

        } // eof edit_reference();

        // Update Reference
        public function update_reference($reference_id){
            $this->load->library('form_validation');
            $user_id = $this->session->userdata('login_id');
            //fetch data from User_model 
            $data['user_lang'] = $this->User_model->get_lang();
            $data['edit_reference'] = $this->Reference_model->edit_reference($reference_id); 
            if (!$data['edit_reference'])
             show_404();
            $this->form_validation->set_rules('reference_lang','Reference Language','required');
            $this->form_validation->set_rules('reference_title','Reference Title','required');
            $this->form_validation->set_rules('reference_category','Reference Type','required');

            $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            
            if($this->form_validation->run() ) { //if validation passes
                //Validation Success
                $post = $this->input->post();
                unset($post['Submit'], $post['reference_addedby']);

                if($this->Reference_model->update_reference($reference_id, $post)){

                    $this->session->set_flashdata("feedback", "Reference Updated Successfully");
                    $this->session->set_flashdata("feedback_class", "alert-success");
                    $this->load->view('admin/edit_reference', $data); 
                    // sleep(5);
                    header("Refresh: 2; ../../reference/reference_profile/{$reference_id}");
                }else{
                    $this->session->set_flashdata("feedback", "Failed to Update");
                    $this->session->set_flashdata("feedback_class", "alert-danger");
                    $this->load->view('admin/edit_reference', $data); 
                    // echo "Failed to add to database";
                }
            }else{
                // $data['user_nativelang'] = $this->input->post('user_nativelang', TRUE);
                //pass data to view 
                //Validation Fail
                // echo "Validation errors";
                $this->load->view('admin/edit_reference', $data); 
                // echo validation_errors();
            }
        } // eof update_reference();

        // Constructor
        function __construct() {
            parent::__construct(); 
            $this->load->model('User_model'); 
            $this->load->model('Proverbs_model');
            $this->load->model('Reference_model');
        } // eof constructor __construct()
    } // eof Class Reference
?>    