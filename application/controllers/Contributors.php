<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contributors extends CI_Controller{
        // Show Contributors Page
    public function index(){
        // Check if login
        // echo '<H1 class="font-weight-light text-center">Contributors</H1>';
        $all_contributors = $this->Contributors_model->contributors_list();
        $data['all_contributors1'] = $all_contributors;
        $data['title'] = 'Heros';
        $this->load->view('public/contributors_list', $data);
        // $this->load->view('public/reference_all_list', ['all_reference1'=>$all_reference, 'title'=>'Contt']);
        // $this->load->view('public/reference_all_list', ['all_reference1'=>$all_reference, $data]);
        // $this->load->view('public/contributors_list', $data, FALSE);
    } // eof index();

        // Contributors Profile
    public function contributors_profile($user_name){
        $data['title'] = 'Contributor';
        $contributor_profile = $this->Contributors_model->get_contributor_profile($user_name);
        $total_all_proverbs = $this->Statistics_model->total_no_of_proverbs_added_by_user($user_name);
        
        if (!$contributor_profile)
            show_404();
        $this->load->view('public/contributor_profile', compact('contributor_profile', 'total_all_proverbs'));
    } // eof reference_profile();        
 
    // Edit reference
    public function edit_contributor($user_name){
        if(!$this->session->userdata('login_id')){
            redirect('user');
        }
        $data['edit_contributor'] = $this->Contributors_model->edit_contributor($user_name);
        $data['title'] = 'Edit Contributor';

        if (!$data['edit_contributor'])
            show_404();

        $this->load->view('admin/edit_contributor', $data);

    } // eof edit_contributor();


    // Update contributor
    public function update_contributor($user_name){
        $this->load->library('form_validation');
        $user_id = $this->session->userdata('login_id');
        //fetch data from User_model  
        $data['edit_contributor'] = $this->Contributors_model->edit_contributor($user_name); 
        if (!$data['edit_contributor'])
            show_404();

        $this->form_validation->set_rules('tm_title','Title/Role','required');
        $this->form_validation->set_rules('tm_description','Description','required'); 

        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            
        if($this->form_validation->run() ) { //if validation passes
            //Validation Success
            $post = $this->input->post();
            unset($post['Submit'], $post['tm_timestamp']);

            if($this->Contributors_model->update_contributor($user_name, $post)){

                $this->session->set_flashdata("feedback", "Profile Updated Successfully");
                $this->session->set_flashdata("feedback_class", "alert-success");
                $this->load->view('admin/edit_contributor', $data); 
                // sleep(5);
                header("Refresh: 2; ../../contributors/contributors_profile/{$user_name}");
            }else{
                $this->session->set_flashdata("feedback", "Failed to Update");
                $this->session->set_flashdata("feedback_class", "alert-danger");
                $this->load->view('admin/edit_contributor', $data); 
                // echo "Failed to add to database";
            }
        }else{
            // $data['user_nativelang'] = $this->input->post('user_nativelang', TRUE);
            //pass data to view 
            //Validation Fail
            // echo "Validation errors";
            $this->load->view('admin/edit_contributor', $data); 
            // echo validation_errors();
        }
    } // eof update_contributor();
        

    
        // Constructor
    function __construct() {
        parent::__construct();
        // $this->load->model('User_model');
        $this->load->model('Contributors_model');
        $this->load->model('Statistics_model');
        // $this->load->model('Proverbs_model');
        // $this->load->model('Statistics_model');
    } // eof constructor __construct()
} // eof class User