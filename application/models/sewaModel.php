<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sewaModel extends CI_Model
{
    public function insertNewSewa($data_masuk)
    {
        $this->db->insert('sewa_mobil', $data_masuk);
    }
    public function getDisewaByUserID($user_id_session)
    {
        $query = "SELECT `sewa_mobil`.*, `mobil`.`nama_mobil`
        FROM `sewa_mobil` 
        JOIN `mobil` 
        ON `sewa_mobil`.`mobil_id` = `mobil`.`mobil_id` 
        WHERE `sewa_mobil`.`user_id` = $user_id_session ";

        return $this->db->query($query)->result_array();
    }

    public function getAllSewa()
    {
        $query = "SELECT `sewa_mobil`.*, `mobil`.`nama_mobil`, `user`.`username`
        FROM `sewa_mobil` 
        JOIN `mobil`
        ON `sewa_mobil`.`mobil_id` = `mobil`.`mobil_id` 
        JOIN `user`
        ON `sewa_mobil`.`user_id` = `user`.`user_id`
        WHERE `sewa_mobil`.`status_sewa` = 0 ";

        return $this->db->query($query)->result_array();
    }

    public function getSewaByCustomer()
    {
        $query = "SELECT `sewa_mobil`.*, `mobil`.`nama_mobil`, `user`.`username`
        FROM `sewa_mobil` 
        JOIN `mobil`
        ON `sewa_mobil`.`mobil_id` = `mobil`.`mobil_id` 
        JOIN `user`
        ON `sewa_mobil`.`user_id` = `user`.`user_id`
        WHERE `sewa_mobil`.`status_sewa` = 1 ";

        return $this->db->query($query)->result_array();
    }
}
