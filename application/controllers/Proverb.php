<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Proverb extends CI_Controller{
        // Show all proverbs on Main Screen
        public function index(){
            $this->load->library('pagination');

                $config['base_url']         = base_url('proverb/index');
                $config['total_rows']       = $this->Proverbs_model->num_rows_proverbs();
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

            $all_proverbs = $this->Proverbs_model->proverb_list($config['per_page'], $this->uri->segment(3));
            $total_all_proverbs = $this->Proverbs_model->num_rows_proverbs();
            $this->load->view('public/home', ['all_proverb1'=>$all_proverbs, 'total_all_proverbs'=>$total_all_proverbs]);
        }

        // Go to Add Proverb Page
        public function add_proverb(){
            if(!$this->session->userdata('login_id')){
                redirect('user');
            }
            $data['user_lang'] = $this -> User_model -> get_lang(); 
            $data['dd_reference'] = $this -> Proverbs_model -> get_reference();
            $data['title'] = 'Add Proverb';
            $this->load->view('admin/add_proverb', $data);
        } // eof add_proverb();

        // Insert Proverb
        public function insert_proverb(){
            if(!$this->session->userdata('login_id')){
                redirect('user');
            }    
            $this->load->library('form_validation');
            // $this->load->library('session');

            $data['user_lang'] = $this->User_model->get_lang(); 
            $data['dd_reference'] = $this->Proverbs_model->get_reference(); 

            $this->form_validation->set_rules('proverb_lang','Proverb Language','required');
            $this->form_validation->set_rules('proverb_statement','Proverb Statement','required');
            $this->form_validation->set_rules('proverb_reference','Proverb Reference','required');
            
            $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            
            if( $this->form_validation->run() ) { //if validation passes
                //Validation Success
                $post = $this->input->post();
                unset($post['Submit']); 

                if($this->Proverbs_model->add_proverb($post)){

                    $this->session->set_flashdata("feedback", "Successfully added to database");
                    $this->session->set_flashdata("feedback_class", "alert-success");
                    //echo "Successfully added to database";
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
    
        // Edit Proverb
        public function edit_proverb($proverb_id){
            if(!$this->session->userdata('login_id')){
                redirect('user');
            }
            // Check if proverb is not protected
            $is_protected = $this->Proverbs_model->get_proverb_in_detail($proverb_id);
            if (!$is_protected->proverb_is_protected == 0) {
                redirect('proverb');
            }
            $data['user_lang'] = $this->User_model -> get_lang(); 
            $data['dd_reference'] = $this->Proverbs_model -> get_reference(); 
            $data['edit_proverb'] = $this->Proverbs_model -> edit_proverb($proverb_id);
            $data['title'] = 'Edit Proverb';
            if (!$data['edit_proverb'])
                show_404();

            $id = $this->session->userdata('login_id');
            $this->load->view('admin/edit_proverb', $data);  

        } // eof edit_proverb();

        // Update Proverb
        public function update_proverb($proverb_id){
            if(!$this->session->userdata('login_id')){
                redirect('user');
            }
            $this->load->library('form_validation');
            $user_id = $this->session->userdata('login_id');
            //fetch data from User_model 
            $data['user_lang'] =    $this->User_model->get_lang();
            $data['dd_reference'] = $this->Proverbs_model->get_reference(); 
            $data['edit_proverb'] = $this->Proverbs_model->edit_proverb($proverb_id);

            if (!$data['edit_proverb'])
                show_404();

            $this->form_validation->set_rules('proverb_lang','Proverb Language','required');
            $this->form_validation->set_rules('proverb_statement','Proverb Statement','required');
            $this->form_validation->set_rules('proverb_reference','Proverb Reference','required');
            
            $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            
            if( $this->form_validation->run() ) { //if validation passes
                $post = $this->input->post();
                unset($post['Submit']); 
                unset($post['proverb_timestamp']); 
    
                if($this->Proverbs_model->update_proverb($proverb_id, $post)){
                    // Now insert contributor to db
                    $this->Proverbs_model->update_proverb_contributors($proverb_id, $user_id);

                    $this->session->set_flashdata("feedback", "Proverb Updated Successfully");
                    $this->session->set_flashdata("feedback_class", "alert-success");
                    // echo "Successfully added to database";
                    // $this->load->view('admin/add_proverb');
                    $this->load->view('admin/edit_proverb', $data); 
                    // sleep(5);
                    header("Refresh: 2; ../../proverb/proverb_detail/{$proverb_id}");
                }else{
                    $this->session->set_flashdata("feedback", "Failed to Update");
                    $this->session->set_flashdata("feedback_class", "alert-danger");
                    $this->load->view('admin/edit_proverb', $data); 
                    // echo "Failed to add to database";
                }
            }else{
                // $data['user_nativelang'] = $this->input->post('user_nativelang', TRUE);
                //pass data to view 
                //Validation Fail
                $this->load->view('admin/edit_proverb', $data); 
                // echo validation_errors();
            }
        } // eof update_proverb();

        // Load Data of Proverb
        public function proverb_detail($id){            
            $my_proverbs =      $this->Proverbs_model->get_proverb_in_detail($id);
            $proverbs_rating =  $this->Proverbs_model->proverbs_individual_rating($id);
            $proverb_contributors =  $this->Proverbs_model->proverb_contributors($id);
            $if_added_to_favorite = $this->Favorites_model->if_added_to_fav($id);

            // print_r($if_added_to_favorite);  
            // print_r($id);  

            if (!$my_proverbs)
                show_404();
            $this->load->view('public/proverb_detail', compact(['my_proverbs', 'proverbs_rating', 'proverb_contributors', 'if_added_to_favorite']));
        } // eof proverb();

        // Rate Proverb from Proverb_Details Page
        public function rate_proverb(){
            $post = $this->input->post();
            unset($post['Submit']);
            $this->Proverbs_model->rate_proverb($post);
            $proverb_id = $this->input->post('proverb_id');
            redirect("proverb/proverb_detail/{$proverb_id}");
        } // eof rate_proverb(); 

        // Link two proverbs
        public function link_two_proverbs(){
            if(!$this->session->userdata('login_id')){
                redirect('user');
            }
            $data['user_lang'] = $this -> User_model -> get_lang();
            $data['title'] = 'Link Proverb'; 
            $this->load->view('admin/link_two_proverbs', $data);
        } // eof link_two_proverbs();

        // display Proverb of specofic language 
        public function display(){
            // $option = $this->input->post();
            // unset($option['Submit']);
            $option = $this->input->post('rating_proverb_rating_value');
    
            if ($option == 0) {
                $option_dropdown = $this->Proverbs_model->num_rows_proverbs();
            }else{
                $option_dropdown = $this->Proverbs_model->num_rows_proverbs_for_lang($option);
            }

            $this->load->library('pagination');
            $config['base_url']         = base_url("proverb/display/{$option}");
            $config['total_rows']       = $option_dropdown;
            // $config['total_rows']       = $option['rating_proverb_rating_value'];
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

            $all_proverbs = $this->Proverbs_model->display_proverb($config['per_page'], $this->uri->segment(4), $option);
            // $all_proverbs = $this->Proverbs_model->display_proverb($config['per_page'], 0, $option['rating_proverb_rating_value']);
            // $total_all_proverbs = $this->Proverbs_model->num_rows_proverbs_for_lang($option_dropdown);
            // $this->load->view('public/home', ['all_proverb1'=>$all_proverbs, 'total_all_proverbs'=>$total_all_proverbs]);
            $this->load->view('public/home', ['all_proverb1'=>$all_proverbs, 'total_all_proverbs'=>$option_dropdown]);
            
        } // eof display();
        
        // Search Proverb
        public function search(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('query', 'Query', 'required');
            if (!$this->form_validation->run()) {
                $this->index();
            }else{
            $query = $this->input->post('query');
            return redirect("proverb/search_results/$query");
            }
        } // eof search()

        // Search Results for Proverb
        public function search_results($query){
            
            $query1 = urldecode($query);

            $this->load->model('Search_model');
            $this->load->library('pagination');

            $config['base_url']         = base_url("proverb/search_results/$query1");
            $config['total_rows']       = $this->Search_model->num_rows_proverbs_search($query1);
            $config['per_page']         = 2;
            $config['uri_segment']      = 4;
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
            $title              = "Search";
            $all_proverbs       = $this->Search_model->search_proverb($query1, $config['per_page'], 
                                                        $this->uri->segment(4));
            $total_all_proverbs = $this->Search_model->num_rows_proverbs_search($query1);
            $this->load->view('public/search', ['all_proverb1'=>$all_proverbs, 'total_all_proverbs'=>$total_all_proverbs, 'title'=>$title]);
        
        } // eof search_results()


        public function if_added_to_fav($proverb_id){
            $this->load->model('Favorites_model');
            $my_proverbs =      $this->Favorites_model->if_favorites_available($proverb_id);
            if ($my_proverbs){
                // show_404();
                print_r("Yes");
            }else{
                print_r("No");
            }
            // $this->load->view('public/proverb_detail', compact(['my_proverbs', 'proverbs_rating', 'proverb_contributors']));
        } // eof proverb();


        // Constructor
        public function __construct(){
            parent::__construct();
            $this->load->model('Proverbs_model');
            $this->load->model('User_model');
            $this->load->model('Favorites_model');
        } // eof __construct();

}