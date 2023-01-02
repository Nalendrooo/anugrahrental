<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customerModel extends CI_Model
{
    public function getCustomerByUserID($user_id_session)
    {
        $this->db->where('user_id', $user_id_session);
        return $this->db->get('customer')->row_array();
    }

    public function getCustomerByID($customer_id)
    {
        $this->db->where('user_id', $customer_id);
        return $this->db->get('customer')->row_array();
    }

    public function getAllCustomer()
    {
        $this->db->where('role', 3);
        return $this->db->get('user')->result_array();
    }

    public function saveCustomer($data_masuk)
    {
        $this->db->insert('customer', $data_masuk);
    }


    public function updateCustomer($where, $data_masuk)
    {
        $this->db->where('customer_id', $where);
        $this->db->update('customer', $data_masuk);
    }
}
