<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$courses = array();

		$this->load->model('Course_model');
		$courses = $this->Course_model->get_all_courses();
		$this->session->set_userdata('courses', $courses);
		$this->output->enable_profiler(TRUE); 
	}

	public function index()
	{
		// Including Validation Library
		$this->load->library('form_validation');
		// Displaying Errors In Div
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		// Validation For Course name field
		$this->form_validation->set_rules('course_name', 'Course Name', 'required|min_length[15]');

		if ($this->form_validation->run() == FALSE)
			$this->load->view('courses_view');
		else
			$this->add();

	}

	public function add()
	{
		$this->load->model('Course_model');

		$new_course = array('title' => $this->input->post('course_name') ,
		   					'description' => $this->input->post('course_description') ,
		   					'created_at' => date("Y-m-d H:i:s")
						);

		$course_id = $this->Course_model->add_course($new_course);
		redirect(base_url());
	}

	public function choose($id)
	{
		$this->load->model("Course_model");
		$delete_id = $this->Course_model->choose_course($id);
		$this->load->view('destroy', $delete_id);
	}

	public function destroy($id)
	{
		$this->load->model("Course_model");
		$delete_id = $this->Course_model->delete_course($id);
		redirect(base_url());
	}
}