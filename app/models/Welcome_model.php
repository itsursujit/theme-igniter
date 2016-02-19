<?php
class Welcome_model extends CI_Model {

        public function getWelcome()
        {
                $record=$this->db->query('SELECT * FROM employees')->result_array();
                echo json_encode($record);
        }
}