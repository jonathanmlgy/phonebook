<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Contacts extends CI_Controller {

	public function index()
	{
		$this->load->model("Contact");
		$view_data['contacts'] = $this->Contact->get_all_contacts();
		$this->load->view('phonebook', $view_data);
	}

	public function new()
	{
		$this->load->view('add_contacts');
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("name", "Name", "trim|required|min_length[5]|max_length[45]");
		$this->form_validation->set_rules("number", "Number", "trim|required|min_length[11]|max_length[11]");
		if($this->form_validation->run() === FALSE)
		{
			$this->view_data['errors'] = validation_errors();
			$this->load->view('add_contacts', $this->view_data);
		} else {
			$this->load->model("Contact"); 
			$name = $this->input->post('name');
			$number = $this->input->post('number');
			$contact_details = array(
				'name' => $name,
				'number' => $number
			);
			$add_contact = $this->Contact->add_contact($contact_details); 
			if($add_contact === TRUE) {
				redirect("contacts");
			}
		}
	}

	public function show($show_id)
	{
		$this->load->model("Contact");
		$contact_id = $this->Contact->get_contact_by_id($show_id); 
		$this->load->view('show', $contact_id);
	}

	public function edit($edit_id)
	{
		$view_data['edit_id'] = $edit_id;
		$this->load->view('update', $view_data);
	}

	public function update($update_id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("name", "Name", "trim|required|min_length[5]|max_length[45]");
		$this->form_validation->set_rules("number", "Number", "trim|required|min_length[11]|max_length[11]");
		if($this->form_validation->run() === FALSE)
		{
			$this->view_data['edit_id'] = $update_id;
			$this->view_data['errors'] = validation_errors();
			$this->load->view('update', $this->view_data);
		} else {
			$this->load->model("Contact"); 
			$name = $this->input->post('name');
			$number = $this->input->post('number');
			$new_contact_details = array(
				'name' => $name,
				'number' => $number,
				'update_id' => $update_id
			);
			$update_contact = $this->Contact->update_contact($new_contact_details); 
			if($update_contact === TRUE) {
				redirect("contacts");
			}
		}
	}

	public function destroy($destroy_id)
	{
		$this->load->model("Contact");
		$delete_id = $this->Contact->delete_by_id($destroy_id); 
		if($delete_id === TRUE) {
			redirect("contacts");
		}
	}
}
?>