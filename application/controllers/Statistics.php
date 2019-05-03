<?php
    class Statistics extends CI_Controller{
        // Index Show Statistics
        public function index(){
            $this->load->model('Statistics_model');
            $data = $this->Statistics_model->total_no_of_proverbs();
            $data2 = $this->Statistics_model->total_no_of_eng_proverbs();
            $data3 = $this->Statistics_model->total_no_of_ur_proverbs();
            $data4 = $this->Statistics_model->total_no_of_ps_proverbs();
            $data5 = $this->Statistics_model->total_no_of_users();
            $data6 = $this->Statistics_model->total_no_of_languages();
            $data7 = $this->Statistics_model->total_no_of_reference_items();
            $data8 = $this->Statistics_model->total_no_of_proverbs_stars();

            

            $this->load->view('public/statistics', ['total_no_of_proverbs'=>$data, 
            'total_no_of_eng_proverbs'=>$data2, 
            'total_no_of_ur_proverbs'=>$data3, 
            'total_no_of_ps_proverbs'=>$data4, 
            'total_no_of_users'=>$data5,
            'total_no_of_languages'=>$data6, 
            'total_no_of_reference_items'=>$data7,
            'total_no_of_proverbs_stars'=>$data8]);

    
        } // eof index();
    } // eof class Statistics 