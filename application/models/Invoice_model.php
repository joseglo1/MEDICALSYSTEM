<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Invoice_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
   
    function add_invoice($params)
    {
        $this->db->insert('invoice',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update Booking
     */
    function update_invoice($id_invoice,$params)
    {
        $this->db->where('id_Invoice',$id_invoice);
        return $this->db->update('invoice',$params);
    }
    
    /*
     * function to delete Booking
     */
    function delete_invoice($id_invoice)
    {
        return $this->db->delete('invoice',array('id_Invoice'=>$id_invoice));
    }
}
