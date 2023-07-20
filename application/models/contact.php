<?php
class Contact extends CI_Model {
    function add_contact($contact_details)
    {
        $query = "INSERT INTO phonebook(name, contact_number, created_at, updated_at) VALUES (?,?,?,?)";
        $values = array($contact_details['name'], $contact_details['number'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
        return $this->db->query($query, $values);
    }

    function update_contact($new_contact_details)
    {
        $query = "UPDATE phonebook SET name = ?, contact_number = ?, updated_at = ? WHERE id = ?";
        $values = array($new_contact_details['name'], $new_contact_details['number'], date("Y-m-d, H:i:s"), $new_contact_details['update_id']); 
        return $this->db->query($query, $values);
    }

    function get_contact_by_id($show_id)
    {
        return $this->db->query("SELECT id, name, contact_number FROM Phonebook WHERE id = ?", array($show_id))->row_array();
    }
    
    function delete_by_id($destroy_id)
    {
        return $this->db->query("DELETE FROM Phonebook WHERE id = ?", array($destroy_id));
    }

    function get_all_contacts()
    {
        return $this->db->query("SELECT id, name, contact_number FROM phonebook")->result_array();
    }
}
?>