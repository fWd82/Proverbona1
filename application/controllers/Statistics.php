<?php
    class Statistics extends CI_Controller{
        public function index(){
            $this->load->model('Statistics_model');
            $data = $this->Statistics_model->total_no_of_proverbs();
            $data2 = $this->Statistics_model->total_no_of_users();
            $data3 = $this->Statistics_model->total_no_of_users();
            $this->load->view('public/statistics', ['total_no_of_proverbs'=>$data, 'total_no_of_users'=>$data2, 'total_no_of_languages'=>$data3]);
        }
    }
?>