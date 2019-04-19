<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends CI_Controller{
        public function index(){
            $this->load->model('Proverbs_model');
            $all_proverbs = $this->Proverbs_model->proverb_list();
            // $my_proverbs = $this->Proverbs_model->get_proverb_id($id);
            $this->load->view('public/home', ['all_proverb1'=>$all_proverbs]);
        }
        public function proverb($id){
            $this->load->model('Proverbs_model');
            $my_proverbs = $this->Proverbs_model->get_proverb_id($id);
            $this->load->view('public/proverb_detail', compact('my_proverbs'));
        } // eof proverb();

        public function my_profile(){
            $id = $this->session->userdata('login_id');
            $this->load->model('User_model');
            $my_profile = $this->User_model->get_my_profile($id);
            $this->load->view('admin/my_profile', compact('my_profile'));
        } // eof my_profile();

        public function edit_my_profile(){
            $id = $this->session->userdata('login_id');
            $this->load->model('User_model');
            $data['user_lang'] = $this -> User_model -> get_lang();
            $data['my_data'] = $this -> User_model -> edit_my_profile($id);
            $this->load->view('admin/my_profile_edit', $data); 
        } // eof edit_my_profile();


        public function update_my_profile(){

            $this->load->library('form_validation');
            $this->load->library('session');
            $id = $this->session->userdata('login_id');
            $this->load->model('User_model');
            //fetch data from User_model 
            $data['user_lang'] = $this -> User_model -> get_lang(); 
            $data['my_data'] = $this -> User_model -> edit_my_profile($id);


            $this->form_validation->set_rules('user_fullname','Full Name','required');
            $this->form_validation->set_rules('user_name','User Name','required');
            // $this->form_validation->set_rules('user_name','User Name','required|is_unique[table_user.user_name]');            
            // $this->form_validation->set_rules('user_nativelang','Native Language','required');

            $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            
            if( $this->form_validation->run() ) { //if validation passes
                //Validation Success
                $post = $this->input->post();
                unset($post['Submit']); 

                $this->load->model('User_model');
                if($this->User_model->update_my_profile($id, $post)){

                    $this->session->set_flashdata("feedback", "Updated Successfully");
                    $this->session->set_flashdata("feedback_class", "alert-success");
                    // echo "Successfully added to database";
                    // $this->load->view('admin/add_proverb');
                    $this->load->view('admin/my_profile_edit', $data); 
                    // sleep(5);
                    header("Refresh: 2; my_profile");
                    // redirect('home/my_profile','refresh');
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
        } // eof edit_my_profile();

        public function user_profile($id){
            $this->load->model('User_model');
            $user_profile = $this->User_model->get_user_profile($id);
            $this->load->view('admin/user_profile', compact('user_profile'));
        } // eof user_profile();


        public function reference_profile($id){
            $this->load->model('Proverbs_model');
            $reference_profile = $this->Proverbs_model->get_reference_profile($id);
            $this->load->view('admin/reference_profile', compact('reference_profile'));
        } // eof reference_profile();

        public function link_two_proverbs(){
            $this->load->model('User_model');
            $data['user_lang'] = $this -> User_model -> get_lang();
            // $this -> load -> view('public/signup', $data); 
            $this->load->view('admin/link_two_proverbs', $data);
        } // eof reference_profile();
    }
?>