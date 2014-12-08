<?php 

class Course_model extends CI_Model
{
     public function get_all_courses()
     {
        $result = $this->db->get('courses')->result_array();
        return $result;
     }

    public function add_course($new_course)
    {
        $this->db->insert('courses', $new_course); 
    }

    public function choose_course($id)
    {
        $result = $this->db->get_where('courses', array('id' => $id))->row_array();
        return $result;
    }

    public function delete_course($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('courses'); 
    }
}

?>