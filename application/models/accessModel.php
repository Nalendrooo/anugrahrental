<?php
defined('BASEPATH') or exit('No direct script access allowed');

class accessModel extends CI_Model
{

    public function getUserAccessMenuByRole($role_session)
    {
        $query = "SELECT `user_menu`.`menu_id`, `menu_for` 
                    FROM `user_menu` 
                    JOIN `user_access_menu` 
                    ON `user_menu`.`menu_id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_session
                    ORDER BY `user_access_menu`.`menu_id` 
                    ASC
                        ";
        return $this->db->query($query)->result_array();
    }

    public function getSubMenuUser($menu_id)
    {

        $query = "SELECT * 
             FROM `user_sub_menu` 
             JOIN `user_menu` 
             ON `user_sub_menu`.`menu_id` = `user_menu`.`menu_id`
             WHERE `user_sub_menu`.`menu_id` = $menu_id 
             AND `user_sub_menu`.`is_active` = 1 ";

        return $this->db->query($query)->result_array();
    }
}
