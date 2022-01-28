<?php

defined('BASEPATH') or die("direct script access not allowed");

class Home_model extends CI_Model{
    public function get_initial_data(){
        $avg=$this->get_average_data();
        $student_data=$this->get_student_details();
        foreach($avg as $key=>$val)
        {
            $avg[$key]["gender"]=$student_data[$key]['student_gender'];
        }
        return $avg;        
    }

    public function get_average_data(){
        $query=$this->db->query("select student_id,avg(marks) as avg from student_marks_table group by student_id asc");
        $result=$query->result_array();
        return $result;
    }

    public function get_student_details(){
        $this->db->select('student_gender');
        $this->db->order_by('id','asc');
        $query=$this->db->get('student_details');
        $result=$query->result_array();
        return $result;
    }

}

?>