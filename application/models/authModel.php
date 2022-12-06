<?php
defined('BASEPATH') or exit('No direct script access allowed');

class authModel extends CI_Model
{

    public function getUserByEmail($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('user')->row_array();
    }

    public function getUserTokenByToken($token)
    {
        $this->db->where('token', $token);
        return $this->db->get('user_token')->row_array();
    }

    public function getUserIsActive($email)
    {
        $this->db->where('email', $email);
        $this->db->where('is_active', 1);
        return $this->db->get('user')->row_array();
    }

    public function getUserBySession($email_session)
    {
        $this->db->where('email', $email_session);
        return $this->db->get('user')->row_array();
    }



    public function insertUser($data)
    {
        $this->db->insert('user', $data);
    }

    public function insertToken($user_token)
    {
        $this->db->insert('user_token', $user_token);
    }


    public function updateUserToActive($email)
    {
        $this->db->set('is_active', 1);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function updatePasswordByEmail($email, $password)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');
    }



    public function deleteUserTokenByEmail($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('user_token');
    }

    public function deleteUserByEmail($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('user');
    }
}
