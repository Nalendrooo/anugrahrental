<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mobilModel extends CI_Model
{
    public function getMerek()
    {
        return $this->db->get('mobil_merek')->result_array();
    }
    public function getAllMobil()
    {
        $query = "SELECT `mobil`.*, `mobil_merek`.`nama_merek`
        FROM `mobil` 
        JOIN `mobil_merek` 
        ON `mobil`.`merek_id` = `mobil_merek`.`merek_id`";

        return $this->db->query($query)->result_array();
    }

    public function getMobilReady()
    {
        $query = "SELECT `mobil`.*, `mobil_merek`.`nama_merek`
        FROM `mobil` 
        JOIN `mobil_merek` 
        ON `mobil`.`merek_id` = `mobil_merek`.`merek_id` 
        WHERE `mobil`.`is_active` = 1 
        AND `mobil`.`status_mobil` = 1";

        return $this->db->query($query)->result_array();
    }

    public function getMobilActive()
    {
        $query = "SELECT `mobil`.*, `mobil_merek`.`nama_merek`
        FROM `mobil` 
        JOIN `mobil_merek` 
        ON `mobil`.`merek_id` = `mobil_merek`.`merek_id` 
        WHERE `mobil`.`is_active` = 1";

        return $this->db->query($query)->result_array();
    }

    public function getMobilDbooking()
    {
        $this->db->where('status_mobil', 3);
        $this->db->get('mobil');
    }

    public function getMobilByMobilID($mobil_id)
    {
        $query = "SELECT `mobil`.*, `mobil_merek`.`nama_merek`
        FROM `mobil` 
        JOIN `mobil_merek` 
        ON `mobil`.`merek_id` = `mobil_merek`.`merek_id` 
        WHERE `mobil`.`is_active` = 1 
        AND `mobil`.`mobil_id` = $mobil_id ";
        return $this->db->query($query)->result_array();
    }

    public function insertMobil($data_masuk)
    {

        $this->db->insert('mobil', $data_masuk);
    }

    public function updateMobil($where, $data_masuk)
    {

        $this->db->where('mobil_id', $where);
        $this->db->set($data_masuk);
        $this->db->update('mobil');
    }

    public function updateMobilDisewa($mobil_id)
    {

        $this->db->set('status_mobil', 2);
        $this->db->where('mobil_id', $mobil_id);
        $this->db->update('mobil');
    }
}
