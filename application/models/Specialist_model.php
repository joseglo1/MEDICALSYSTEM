<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Specialist_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get specialist by id_Specialist
     */
    function get_specialist($id_specialist)
    {
        return $this->db->get_where('specialist',array('id_Specialist'=>$id_specialist))->row_array();
    }
        
    /*
     * Get all Specialists
     */
    function get_all_specialist2()
    {
        $this->db->select('*');
        $this->db->from('Specialist');
        $this->db->order_by("id_Specialist");
        return $this->db->get()->result_array();

    }
    function get_all_specialist()
    {
        $this->db->order_by('name', 'asc');
        return $this->db->get('Specialist')->result_array();
    }
        
    /*
     * function to add new Specialists
     */
    function add_specialist($params)
    {
        $this->db->insert('Specialist',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update specialist
     */
    function update_specialist($id_specialist,$params)
    {
        $this->db->where('id_Specialist',$id_specialist);
        return $this->db->update('Specialist',$params);
    }
    
    /*
     * function to delete Specialist
     */
    function delete_specialist($id_specialist)
    {
        return $this->db->delete('Specialist',array('id_Specialist'=>$id_specialist));
    }
}