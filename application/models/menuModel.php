<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menuModel extends CI_Model
{

    public function getMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu_for`
                    FROM `user_sub_menu` 
                    JOIN `user_menu` 
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`menu_id`";
        return $this->db->query($query)->result_array();
    }

    public function getAccessMenu()
    {
        return $this->db->get('user_access_menu')->result_array();
    }




    public function saveMenu($data_masuk)
    {
        $this->db->insert('user_menu', $data_masuk);
    }
    public function saveSubMenu($data_masuk)
    {
        $this->db->insert('user_sub_menu', $data_masuk);
    }




    public function updateMenu($where, $data_masuk)
    {
        $this->db->where('menu_id', $where);
        $this->db->update('user_menu', $data_masuk);
    }

    public function updateSubMenu($where, $data_masuk)
    {
        $this->db->where('sub_menu_id', $where);
        $this->db->update('user_sub_menu', $data_masuk);
    }

    public function deleteMenu($where)
    {
        $this->db->where('menu_id', $where);
        $this->db->delete('user_menu');
    }

    public function deleteSubMenu($where)
    {
        $this->db->where('sub_menu_id', $where);
        $this->db->delete('user_sub_menu');
    }
}
