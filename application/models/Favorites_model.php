<?php
    class Favorites_model extends CI_Model{

        // display_favorite 
        public function display_favorite($limit, $offset, $option){ 
            if ($option == 0) {
                $query = $this->db
                                ->select(['favorite_proverb_id', 'table_proverb.proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_user.user_name', 'proverb_timestamp'])
                                ->from('table_favorite_proverb')
                                // ->where('table_favorite_proverb.proverb_lang', $option)
                                ->order_by('favorite_proverb_timestamp', 'DESC')
                                ->join('table_user', 'table_favorite_proverb.user_id = table_user.user_id')
                                ->join('table_proverb', 'table_favorite_proverb.proverb_id = table_proverb.proverb_id')
                                ->limit($limit, $offset)
                                ->distinct()
                                ->get();
                return $query->result(); 
            }else {
                $query = $this->db
                                ->select(['favorite_proverb_id', 'table_proverb.proverb_id','proverb_statement', 'proverb_tags', 'proverb_latin_eng', 'proverb_eng_meaning', 'table_user.user_name', 'proverb_timestamp'])
                                ->from('table_favorite_proverb')
                                ->where('table_favorite_proverb.proverb_lang', $option)
                                ->order_by('favorite_proverb_timestamp', 'DESC')
                                ->join('table_user', 'table_favorite_proverb.user_id = table_user.user_id')
                                ->join('table_proverb', 'table_favorite_proverb.proverb_id = table_proverb.proverb_id')
                                ->limit($limit, $offset)
                                ->distinct()
                                ->get();
                return $query->result(); 
            } 
        } // eof display_favorite()


        // Returning total number of Proverbs for Pagination
        public function num_rows_favorites(){
            $query = $this->db
                                ->select(['favorite_proverb_id'])
                                ->from('table_favorite_proverb')
                                ->get();
            return $query->num_rows();
        } // eof num_rows_proverbs()

        // Returning total number of Proverbs for Pagination
        public function num_rows_fav_for_lang($proverb_lang){
            $query = $this->db
                                ->select(['favorite_proverb_id'])
                                ->from('table_favorite_proverb')
                                ->where('proverb_lang', $proverb_lang)
                                ->get();
            return $query->num_rows(); 
        } // eof num_rows_proverbs_for_lang()

        // Add to Favorite
        public function add_to_favorite($user_id, $proverb_id, $lang_id){
            return $this->db->insert('table_favorite_proverb', 
                                    ['user_id'=> $user_id, 
                                        'proverb_id'=>$proverb_id,
                                        'proverb_lang'=>$lang_id]);
        }// eof add_to_favorite();


        // // Delete Proverb
        // public function delete_proverb($proverb_id){
        //     return $this->db
        //                     ->where('proverb_id', $proverb_id)
        //                     ->delete('table_proverb');
        // } // eof delete_proverb() 

        // Delete
        public function delete_from_favorite($user_id, $proverb_id){
            return $this->db
                            ->where('user_id', $user_id)
                            ->where('proverb_id', $proverb_id)
                            ->delete('table_favorite_proverb');
        }// eof delete_from_favorite();

        // Check if proverb is already been favorite or not
        public function if_added_to_fav($proverb_id){
            $query = $this->db
                                ->select()
                                ->from('table_favorite_proverb')
                                ->where("proverb_id", $proverb_id)
                                ->get();
            return $query->num_rows();
        } // eof num_rows_proverbs()



    } // eof Class        