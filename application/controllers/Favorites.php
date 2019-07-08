<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
class Favorites extends CI_Controller{

        // Show all Favorites on Favorites front page
        public function index(){
            if(!$this->session->userdata('login_id'))
                redirect('dashboard');
            $this->load->library('pagination');
        
            $config['base_url']         = base_url('favorites/index');
            $config['total_rows']       = $this->User_model->total_no_of_favorite_proverb();
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
        
            $all_proverbs = $this->User_model->proverb_favorite_list($config['per_page'], $this->uri->segment(3));
            $total_all_fav_proverbs = $this->User_model->total_no_of_favorite_proverb();
            $this->load->view('admin/my_favorites', ['all_proverb1'=>$all_proverbs, 'total_all_proverbs'=>$total_all_fav_proverbs]);
        } // eof my_favorites()        

        // Add to Favorite
        public function add_to_favorite($proverb_id){
            $lang_id = $this->uri->segment(4);          
            $user_id = $this->session->userdata('login_id');
            if ($this->Proverbs_model->add_to_favorite($user_id, $proverb_id, $lang_id)){
                redirect("proverb/proverb_detail/{$proverb_id}");
            }else{
                exit("Failed to add to Favorites");
            }    
        } // eof add_to_favorite();

        // Delete Favorites
        public function delete_my_favorite($id){
            if(!$this->session->userdata('login_id'))
            redirect('dashboard');
            // delete
            if ($this->User_model->delete_my_favorite($id)){
                redirect('favorites/index');
            }
            redirect('favorites/index');
        } // eof delete_my_favorite()

        // display Proverb home Page
        public function display(){ 
                $option = $this->input->post('rating_proverb_rating_value');
        
                if ($option == 0) {
                    $option_dropdown = $this->Favorites_model->num_rows_favorites();
                }else{
                    $option_dropdown = $this->Favorites_model->num_rows_fav_for_lang($option);
                }

                $this->load->library('pagination');
                $config['base_url']         = base_url("favorites/display/{$option}");
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

                $all_proverbs = $this->Favorites_model->display_favorite($config['per_page'], $this->uri->segment(4), $option); 
                // $all_proverbs = $this->Favorites_model->display_proverb($config['per_page'], 0, $option['rating_proverb_rating_value']);
                $total_all_proverbs = $this->Favorites_model->num_rows_fav_for_lang($option_dropdown);
                // $this->load->view('public/my_favorites', ['all_proverb1'=>$all_proverbs, 'total_all_proverbs'=>$total_all_proverbs]);
                $this->load->view('admin/my_favorites', ['all_proverb1'=>$all_proverbs, 'total_all_proverbs'=>$option_dropdown]);
                
        } // eof display();
        

        // Constructor
        public function __construct(){
            parent::__construct();
            if(!$this->session->userdata('login_id'))
                redirect('user');
 
            $this->load->model('Favorites_model');
            $this->load->model('Proverbs_model');
            $this->load->model('User_model');
        } // eof __construct();     


} // eof Class Favorites        