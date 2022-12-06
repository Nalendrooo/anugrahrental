<?php

function is_logged_in()
{
    $code = get_instance();
    if (!$code->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $code->session->userdata('role');
        $menu = $code->uri->segment(1);

        $queryMenu = $code->db->get_where('user_menu', ['menu_for' => $menu])->row_array();
        $menu_id = $queryMenu['menu_id'];


        $userAccess = $code->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) :
            redirect('auth/blocked');
        endif;
    }
}

function check_access($role_id, $menu_id)
{
    $code = get_instance();

    $code->db->where('role_id', $role_id);
    $code->db->where('menu_id', $menu_id);
    $result = $code->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked";
    }
}
