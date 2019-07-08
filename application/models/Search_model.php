<?php
    class Search_model extends CI_Model{
        public function search_proverb($query, $limit, $offset){
            $query = $this->db
                                ->select(['proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_reference.reference_title', 'table_user.user_name', 'proverb_timestamp'])
                                ->from('table_proverb')
                                ->like('proverb_statement', $query)
                                ->order_by('proverb_timestamp', 'DESC')
                                ->join('table_user', 'table_proverb.proverb_addedby = table_user.user_id')
                                ->join('table_reference', 'table_proverb.proverb_reference = table_reference.reference_id')
                                ->limit($limit, $offset)
                                ->get();
            return $query->result();
            // return $query->result();
            
            // echo "<pre>";
            // print_r ($query->result());
            // echo "</pre>"; exit();
            
        } // eof search_proverb()

        // Returning total number of Proverbs for Pagination - Search
        public function num_rows_proverbs_search($query){
            $query = $this->db
                                ->select()
                                ->like('proverb_statement', $query)
                                ->get('table_proverb');
            return $query->num_rows();
        } // eof num_rows_proverbs_search()
        
} // eof class Search_model