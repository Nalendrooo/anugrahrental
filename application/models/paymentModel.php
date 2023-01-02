<?php
defined('BASEPATH') or exit('No direct script access allowed');

class paymentModel extends CI_Model
{
    public function getDepositByUserID($user_id_session)
    {
        $this->db->where('user_id', $user_id_session);
        return $this->db->get('deposit')->row_array();
    }

    public function getDepositCustomerByID($customer_id)
    {
        $this->db->where('user_id', $customer_id);
        return $this->db->get('deposit')->result_array();
    }

    public function getDeposit()
    {
        $query = "SELECT `deposit`.*, `user`.`username`
        FROM `deposit` 
        JOIN `user` 
        ON `deposit`.`user_id` = `user`.`user_id`
        WHERE `status_deposit` = 0  
        ORDER BY `deposit`.`deposit_id` ASC";

        return $this->db->query($query)->result_array();
    }


    public function insertNewDeposit($data_masuk)
    {
        $this->db->insert('deposit', $data_masuk);
    }

    public function updateSetujuDeposit($customer_id)
    {
        $this->db->set('status_deposit', 1);
        $this->db->where('user_id', $customer_id);
        $this->db->update('deposit');
    }


    public function updateSetujuPembayaranSewa($sewa_id)
    {
        $this->db->set('status_sewa', 1);
        $this->db->where('sewa_id', $sewa_id);
        $this->db->update('sewa_mobil');
    }
}
