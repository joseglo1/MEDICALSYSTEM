<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Doctor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get doctor by id_doctor
     */
    function get_doctor($id_doctor)
    {
        return $this->db->get_where('doctor',array('id_Doctor'=>$id_doctor))->row_array();
    }
    
    function get_doctor_byuser($id_user)
    {
        $consulta = "SELECT id_Doctor FROM doctor WHERE id_User = ".$id_user.";";
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $iddoctor = $row->id_Doctor;
            }
        }
        return $iddoctor;
    }  
    /*
     * Get all Doctor
     */
    function get_all_doctor2()
    {
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->order_by("id_Doctor");
        return $this->db->get()->result_array();

    }
    function get_all_doctor()
    {
        $this->db->order_by('name', 'asc');
        return $this->db->get('doctor')->result_array();
    }

    function get_user_doctor($id_user)
    {
        $this->db->where('id_User',$id_user);
        return $this->db->get('doctor')->result_array();
    }
        
    /*
     * function to add new Doctor
     */
    function add_doctor($params)
    {
        $this->db->insert('doctor',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update Doctor
     */
    function update_doctor($id_doctor,$params)
    {
        $this->db->where('id_Doctor',$id_doctor);
        return $this->db->update('doctor',$params);
    }
    
    /*
     * function to delete Doctor
     */
    function delete_doctor($id_doctor)
    {
        return $this->db->delete('doctor',array('id_Doctor'=>$id_doctor));
    }
}